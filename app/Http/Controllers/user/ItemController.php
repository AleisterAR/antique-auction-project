<?php

namespace App\Http\Controllers\user;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuctionRequest;
use App\Repository\User\AuctionRepository;
use App\Repository\User\CategoryRepository;
use App\Repository\User\ItemRepository;
use App\Repository\User\ProvenanceRepository;
use App\Services\UploadImageService;
use Carbon\Carbon;

class ItemController extends Controller
{
    protected $itemRepository;
    protected $provenanceRepository;
    protected $categoryRepository;
    protected $auctionRepository;

    public function __construct(
        ItemRepository $itemRepository,
        ProvenanceRepository $provenanceRepository,
        CategoryRepository $categoryRepository,
        AuctionRepository $auctionRepository,
    ) {
        $this->itemRepository = $itemRepository;
        $this->provenanceRepository = $provenanceRepository;
        $this->categoryRepository = $categoryRepository;
        $this->auctionRepository = $auctionRepository;
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
        $item = $this->itemRepository->findById($id);
        if ($item->auction()->exists()) {
            $startTime = $item->auction->start_time;
            $endTime = $item->endTime;

            if ($endTime <= now()) {
                $this->auctionRepository->update(['status' => config('global.auction.staus.completed.value')]);
            } elseif ($startTime >= now()) {
                $this->auctionRepository->update(['status' => config('global.auction.staus.started.value')]);
            }
        }
        return view('user.item.show', compact('item'));
    }
}
