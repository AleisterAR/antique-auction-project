<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Auction;

class AuctionController extends Controller
{
    public function __invoke(){
        $auctions = Auction::with(['item', 'currentBid'])->get();
        return view('admin.user.auction', compact('auctions'));
    }
}
