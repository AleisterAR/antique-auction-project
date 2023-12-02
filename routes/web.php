<?php

use App\Events\BidItem;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\AuctionController;
use App\Http\Controllers\User\BidControlller;
use App\Http\Controllers\User\ItemController;
use App\Models\Item;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require_once(__DIR__ . '/admin.php');

Route::get('/', function () {
    $i = asset('storage/antique/5iDhmI4Qpj1zGbEj7UnfTce2Y45zwEFNWWbAUiq7.png');
    echo "<image src='$i'/>";
});

Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/item/create', [ItemController::class, 'create'])->name('user.item.create');
Route::post('/item/store', [ItemController::class, 'store'])->name('user.item.store');
Route::get('/front/aboutus', [\App\Http\Controllers\User\AboutUsController::class, '__invoke'])->name('front.aboutus');
Route::get('/front/contacts', [\App\Http\Controllers\User\ContactsController::class, '__invoke'])->name('front.contacts');
Route::get('/item/info', [\App\Http\Controllers\User\ItemInfoController::class, '__invoke'])->name('user.item.info');

Route::group(['middleware'  => ['auth']], function () {
    Route::get('/item/{id}', [ItemController::class, 'show'])->name('user.item.show');
    Route::post('/auction', [AuctionController::class, 'store'])->name('item.auction.store');
    Route::post('/bid', [BidControlller::class, 'store'])->name('user.bid.store');
});
