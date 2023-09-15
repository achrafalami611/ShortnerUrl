<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/shorten', 'UrlController@shorten');
Route::get('/{shortUrl}', 'UrlController@redirect');


