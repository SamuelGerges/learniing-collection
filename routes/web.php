<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearningController;


Route::get('/', function () {
    return view('welcome');
});


Route::controller(LearningController::class)->group(function (){
    Route::get('avg' ,'average')->name('avg');
    Route::get('max' ,'maximum')->name('max');
    Route::get('median' ,'median')->name('median');
    Route::get('min' ,'minimum')->name('minimum');
    Route::get('collapse' ,'collapsee')->name('collapse');
    Route::get('chunk' ,'chunks')->name('chunk');
    Route::get('combine' ,'combine')->name('combine');
    Route::get('concat' ,'concat')->name('concat');
    Route::get('contains' ,'contains')->name('contains');
    Route::get('count' ,'countCollection')->name('count');
    Route::get('diff' ,'diff')->name('diff');
    Route::get('diff-assoc' ,'diffAssoc')->name('diff-assoc');
    Route::get('diff-keys' ,'diffkeys')->name('diff-keys');
    Route::get('diff-using' ,'diffUsing')->name('diff-using');
    Route::get('cross-join' ,'cross_Join')->name('cross-join');
    Route::get('tab','tab')->name('tab');
    Route::get('map','map')->name('map');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
