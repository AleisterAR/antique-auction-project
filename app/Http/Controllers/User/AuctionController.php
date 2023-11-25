<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuctionRequest;
use App\Repository\User\AuctionRepository;
use App\Repository\User\ItemRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AuctionController extends Controller
{
    protected $itemRepository;
    protected $auctionRepository;

    public function __construct(ItemRepository $itemRepository, AuctionRepository $auctionRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->auctionRepository = $auctionRepository;
    }

    public function store(AuctionRequest $request): JsonResponse|RedirectResponse
    {
        $user = $request->user();
        $item = $this->itemRepository->findOneByUser($request->item_id, $user->id, ['id']);

        $data = array_merge($request->only([
            'start_time',
            'end_time',
            'initial_price'
        ]), [
            'item_id' => $item->id,
            'user_id' => $user->id,
            'status' => $request->start_time <= now() ? config('global.auction_status.started.value') : config('global.auction_status.pending.value'),
        ]);

        $autction = $this->auctionRepository->store($data);

        return $request->wantsJson() ? response()->json($autction) : back();
    }
}
