<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Items;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
    }

    public function store(Request $request)
    {     
        $item = new Item();
        $item->user_id = request()->user()->id;
        $item->name = $request->name;
        $item->creator = $request->creator;
        $item->year = $request->year;
        $item->image= 'image';
        $item->certificate = 'image';
        $item->description = $request->description;
        $item->save();

        return redirect('/');

    }

    public function register(Request $request)
    {
        return view('user.item.item-register');
    }
}
