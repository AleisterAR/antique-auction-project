<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ItemInfoController extends Controller
{
    public function __invoke(){
        return view('user.item.info');
    }
}