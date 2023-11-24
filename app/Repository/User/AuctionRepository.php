<?php

namespace App\Repository\User;

use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionRepository
{
    protected $model;

    public function __construct(Auction $auction)
    {
        $this->model = $auction;
    }

    public function store($data): Auction
    {
        return $this->model::updateOrCreate(['item_id' => $data['item_id']], $data);
    }

    public function update($data)
    {
        return $this->model::query()->update($data);
    }
}