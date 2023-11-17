<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class ItemDetailController extends Controller
{
    public function __invoke()
    {
        return view('user.item.item-detail');
    }
}
