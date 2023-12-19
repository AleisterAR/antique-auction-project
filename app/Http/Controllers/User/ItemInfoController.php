<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemInfoController extends Controller
{
    public function __invoke()
    {
        $search = request()->search;
        $items = Item::with(['category', 'auction.currentBid'])->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            })->paginate(5);
        $items->appends(request()->query());
        return view('user.item.info', compact('items'));
    }
}
