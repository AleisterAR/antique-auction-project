<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {   
        $items = Item::has('auction')
        ->with(['category', 'auction.currentBid', 'image'])
        ->whereHas('auction', function($query) {
            $query->where('auctions.start_time', '<', now());
        })
        ->latest()
        ->limit(4)
        ->get();
        return view('front.home', compact('items'));
    }
}
