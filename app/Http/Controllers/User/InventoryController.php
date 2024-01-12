<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;

class InventoryController extends Controller
{
    public function __invoke()
    {
        $items = Item::with(['image', 'category', 'provenance.image'])->get();
        return view('user.item.inventory', compact('items'));
    }
}
