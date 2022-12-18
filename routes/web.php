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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
