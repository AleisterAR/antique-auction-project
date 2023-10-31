<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\ItemController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('master');
});


Route::get('/item-register', [ItemController::class, 'register'])->name('user.item-register.index');
Route::post('/item-register', [ItemController::class, 'store'])->name('user.item-register.store');

Route::post('/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/admin', HomeController::class)->name('admin.index')->middleware('admin.auth');
