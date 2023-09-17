<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortnerUrlController;


Route::group([
    'prefix' => 'shortenUrl',
], function () {
    Route::get('/', [ShortnerUrlController::class, 'index'])->name('shortenUrl.index');
    Route::post('/store', [ShortnerUrlController::class, 'store'])->name('shortenUrl.store');
    Route::get('/show/{shortnerUrl}', [ShortnerUrlController::class, 'show'])->name('shortenUrl.show');
    Route::put('/update/{shortnerUrl}', [ShortnerUrlController::class, 'update'])->name('shortenUrl.update');
    Route::delete('/delete/{shortnerUrl}', [ShortnerUrlController::class, 'destroy'])->name('shortenUrl.destroy');
    Route::get('/redirect/{shortnerUrl}', [ShortnerUrlController::class, 'redirect'])->name('shortenUrl.redirect');
});



