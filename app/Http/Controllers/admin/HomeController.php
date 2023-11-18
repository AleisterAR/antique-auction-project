<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
class HomeController extends Controller
{
    public function __invoke()
    {
        $items = Item::with(['images', 'provenance.images'])->get();
        return view('admin.index', compact('items'));
    }
}
