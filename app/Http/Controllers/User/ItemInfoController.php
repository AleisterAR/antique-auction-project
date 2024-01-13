<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;

class ItemInfoController extends Controller
{
    public function __invoke()
    {
        $search = request()->search;
        $c = request()->c;
        $sort = (int)request()->sort === 1 ?  'asc' : 'desc';
        $items = Item::with(['category', 'auction.currentBid', 'image'])
            ->when($c, function($query, $c) {
                $query->where('category_id', $c);
            })
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere(function ($query) use ($search) {
                        $categories = Category::where('name', 'like', '%' . $search . '%')
                            ->pluck('id')
                            ->toArray();
                        $query->whereIn('category_id', $categories);
                    });
            })->when($sort, function ($query, $sort) {
                $query->leftJoin('auctions', 'items.id', '=', 'auctions.item_id')
                    ->orderBy('auctions.initial_price', $sort);
            })->paginate(12);

        $items->appends(request()->query());

        return view('user.item.info', compact('items'));
    }
}
