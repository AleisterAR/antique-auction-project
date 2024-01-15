<?php

namespace App\Http\Controllers\User;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Item;
use App\Models\Provenance;
use App\Repository\User\AuctionRepository;
use App\Repository\User\BidRepository;
use App\Repository\User\CategoryRepository;
use App\Repository\User\ItemRepository;
use App\Repository\User\ProvenanceRepository;
use App\Services\UploadImageService;
use Exception;

class ItemController extends Controller
{
    protected $itemRepository;
    protected $provenanceRepository;
    protected $categoryRepository;
    protected $auctionRepository;
    protected $bidRepository;

    public function __construct(
        ItemRepository $itemRepository,
        ProvenanceRepository $provenanceRepository,
        CategoryRepository $categoryRepository,
        AuctionRepository $auctionRepository,
        BidRepository $bidRepository,
    ) {
        $this->itemRepository = $itemRepository;
        $this->provenanceRepository = $provenanceRepository;
        $this->categoryRepository = $categoryRepository;
        $this->auctionRepository = $auctionRepository;
        $this->bidRepository = $bidRepository;
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('user.item.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $item = array_merge($request->only(['name', 'description', 'condition', 'category_id']), ['user_id' => $request->user()->id]);
        DB::beginTransaction();
        try {
            $newItem = $this->itemRepository->store($item);
            $provenance = array_merge($request->only(['creator', 'year']), ['item_id' => $newItem->id]);
            $newProvenance = $this->provenanceRepository->store($provenance);
            $antiqueImage = new UploadImageService($request->file('antique'));
            $this->itemRepository->storeImages($newItem, [[
                'file_name' => $antiqueImage->hashName,
                'extension' => $antiqueImage->extension,
                'image_type' => config('global.image_type.image_of_antique')
            ]]);

            $provenanceImage = new UploadImageService($request->file('certificate'));
            $this->provenanceRepository->storeImages($newProvenance, [[
                'file_name' => $provenanceImage->hashName,
                'extension' => $provenanceImage->extension,
                'image_type' => config('global.image_type.certificate')
            ]]);

            $antiqueImage->upload('antique');
            $provenanceImage->upload('certificate');

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }

        return to_route('user.item.create');
    }

    public function show(Request $request, $id)
    {
        $currentBid = null;
        $item = $this->itemRepository->findById($id);
        $item->load('category');
        $currentBid = null;
        if ($item->auction()->exists()) {
            $currentBid = $this->bidRepository->currentBid($request->user()->id, $item->auction->id);
            $startTime = $item->auction->start_time;
            $endTime = $item->auction->end_time;
            $item->auction->load('topFiveBids.user');
            if ($endTime <= now()) {
                $this->auctionRepository->update(['status' => config('global.auction_status.completed.value')]);
                $item->auction->refresh();
            } elseif ($startTime <= now()) {

                $this->auctionRepository->update(['status' => config('global.auction_status.started.value')]);
                $item->auction->refresh();
            }
        }
        return view('user.item.show', compact('item', 'currentBid'));
    }

    public function destroy($id)
    {
        $this->itemRepository->destroy($id);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $data = array_merge($request->only(['name', 'description', 'condition', 'category_id']), ['user_id' => $request->user()->id]);
            $this->itemRepository->update($data, $id);
            $provenance = $request->only(['creator', 'year']);
            $this->provenanceRepository->update($provenance, $id);

            if ($request->hasFile('antique')) {
                $antiqueImage = new UploadImageService($request->file('antique'));
                $antiqueImage->upload('antique');

                Image::where('imageable_id', $id)
                    ->where('imageable_type', Item::class)
                    ->update([
                        'file_name' => $antiqueImage->hashName,
                        'extension' => $antiqueImage->extension,
                        'image_type' => config('global.image_type.image_of_antique')
                    ]);
            }

            if ($request->hasFile('certificate')) {
                $item = Item::with(['provenance'])->where('id', $id)->first();
                $provenanceImage = new UploadImageService($request->file('certificate'));
                $provenanceImage->upload('certificate');
                Image::where('imageable_id', $item->provenance->id)
                    ->where('imageable_type', Provenance::class)
                    ->update([
                        'file_name' => $provenanceImage->hashName,
                        'extension' => $provenanceImage->extension,
                        'image_type' => config('global.image_type.certificate')
                    ]);
            }

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            abort(500);
        }
        return redirect()->back();
    }
}
