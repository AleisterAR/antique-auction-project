<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;

class AntiquesController extends Controller
{
    public function __invoke(){
        $items = Item::with(['image', 'category', 'provenance.image'])->get();
        return view('admin.user.antiques', compact('items'));
    }
}
