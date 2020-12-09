<?php

use Illuminate\Support\Facades\Route;
Route::group(['namespace' => '\App\Http\Controllers'], function () {    
    Route::get('/',             'ReflogController@new');
    Route::get('/ref',          'ReflogController@new')->name('ref.new');
    Route::get('/ref-count',    'ReflogController@count')->name('ref.count');
});
