<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {   

        $items = Item::with(['category', 'auction.currentBid', 'image'])->latest()->limit(4)->get();
        return view('front.home', compact('items'));
    }
}
