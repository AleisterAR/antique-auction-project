<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EntryRegisterController;

Route::prefix('/admin')->group(function () {
    Route::group(['middleware' => ['role:admin|expert']], function () {
        Route::get('/', HomeController::class)->name('admin.index');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/user/category', \App\Http\Controllers\Admin\CategoryController::class)->name('admin.user.category');
        Route::post('/user/category', [CategoryController::class, 'store'])->name('admin.user.category');
    });

    Route::group(['middleware' => ['role:expert']], function () {
        Route::patch('/item/{id}/status', [ItemController::class, 'status'])->name('admin.item.update.status');
    });
});
