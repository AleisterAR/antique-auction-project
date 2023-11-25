<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuctionRequest;
use App\Repository\User\AuctionRepository;
use App\Repository\User\ItemRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AboutUsController extends Controller
{

    public function __invoke(){
        return view('front.aboutus');
    }
}

