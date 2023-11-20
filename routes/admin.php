<?php

use App\Http\Controllers\Admin\EntryRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ItemController;

Route::prefix('/admin')->group(function () {
    Route::group(['middleware' => ['role:admin|expert']], function () {
        Route::get('/', HomeController::class)->name('admin.index');
        Route::get('/entry-register', EntryRegisterController::class)->name('entry-register');
    });

    Route::group(['middleware' => ['role:admin']], function() {
        Route::post('/user', [EntryRegisterController::class, 'store'])->name('admin.user.store');
    });

    Route::group(['middleware' => ['role:expert']], function () {
        Route::patch('/item/{id}/status', [ItemController::class, 'updateStatus'])->name('admin.item.updateStatus');
    });
});