<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AuctionRequest;
use App\Models\Auction;
use App\Models\Item;
use App\Models\User;
use App\Repository\User\AuctionRepository;
use App\Repository\User\ItemRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class AboutUsController extends Controller
{

    public function __invoke(){
        $userCount = User::doesntHave('roles')->count();
        $itemCount = Item::toBase()->count();
        $auctionCount = Auction::where('status', 2)->count();
        return view('front.aboutus', compact('userCount', 'itemCount', 'auctionCount'));
    }
}

