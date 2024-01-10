<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function __invoke(){
        return view('user.item.inventory');
    }
}
