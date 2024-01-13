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

Route::get('/',function(){
    return to_route('home');
});

Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::get('/item/create', [ItemController::class, 'create'])->name('user.item.create');
Route::get('/item/inventory', [\App\Http\Controllers\User\InventoryController::class, '__invoke'])->name('user.item.inventory');
Route::post('/item/store', [ItemController::class, 'store'])->name('user.item.store');
Route::get('/about-us', [\App\Http\Controllers\User\AboutUsController::class, '__invoke'])->name('aboutus');
Route::get('/contacts', [\App\Http\Controllers\User\ContactsController::class, '__invoke'])->name('contacts');
Route::get('/item/info', [\App\Http\Controllers\User\ItemInfoController::class, '__invoke'])->name('user.item.info');
Route::get('/home', [\App\Http\Controllers\HomeController::class, '__invoke'])->name('home');
Route::get('/item/{id}/update', [\App\Http\Controllers\User\UpdateController::class, '__invoke'])->name('user.item.update');

Route::group(['middleware'  => ['auth']], function () {
    Route::get('/item/{id}', [ItemController::class, 'show'])->name('user.item.show');
    Route::delete('/item/{id}/delete', [ItemController::class, 'destroy'])->name('user.item.destroy');
    Route::patch('/item/{id}/update', [ItemController::class, 'update'])->name('user.item.update');
    Route::post('/auction', [AuctionController::class, 'store'])->name('item.auction.store');
    Route::post('/bid', [BidControlller::class, 'store'])->name('user.bid.store');
});
