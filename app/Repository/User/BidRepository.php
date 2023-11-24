<?php

namespace App\Repository\User;

use App\Models\Bid;

class BidRepository
{
    protected $model;

    public function __construct(Bid $bid)
    {
        $this->model = $bid;
    }

    public function store($data)
    {
        return  $this->model::query()->create($data);
    }

    public function currentBid($userId, $auctionId)
    {
        return $this->model::where('auction_id', $auctionId)
            ->orderBy('bid_amount', 'desc')
            ->first();
    }
}
