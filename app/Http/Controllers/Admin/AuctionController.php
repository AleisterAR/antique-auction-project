<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuctionController extends Controller
{
    public function __invoke(){
        return view('admin.user.auction');
    }
}
