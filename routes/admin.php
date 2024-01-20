<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EntryRegisterController;
use App\Http\Controllers\AuthController;

Route::prefix('/admin')->group(function () {
    Route::group(['middleware' => ['role:admin|expert']], function () {
        Route::get('/', HomeController::class)->name('admin.index');
        Route::delete('/item/{id}/delete', [ItemController::class, 'destroy'])->name('admin.item.destroy');
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/user/category', \App\Http\Controllers\Admin\CategoryController::class)->name('admin.user.category');
        Route::post('/user/category', [CategoryController::class, 'store'])->name('admin.user.category');
        Route::get('/user/antiques', \App\Http\Controllers\Admin\AntiquesController::class)->name('admin.user.antiques');
        Route::get('/user/auction', \App\Http\Controllers\Admin\AuctionController::class)->name('admin.user.auction');
        Route::get('/user/category-list', \App\Http\Controllers\Admin\CategoryListController::class)->name('admin.user.category-list');
        Route::get('/user/user-list', \App\Http\Controllers\Admin\UserListController::class)->name('admin.user.user-list');
        Route::delete('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

    Route::group(['middleware' => ['role:expert']], function () {
        Route::patch('/item/{id}/status', [ItemController::class, 'status'])->name('admin.item.update.status');
    });
});
