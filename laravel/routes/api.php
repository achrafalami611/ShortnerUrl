<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortnerUrlController;


Route::group(['prefix' => 'shortenUrl'], function () {
    Route::get('/', [ShortnerUrlController::class, 'index'])->name('shortenUrl.index');
    Route::post('/store', [ShortnerUrlController::class, 'store'])->name('shortenUrl.store');
    Route::get('/show/{shortnerUrl}', [ShortnerUrlController::class, 'show'])->name('shortenUrl.show');
});


