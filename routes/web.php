<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearningController;


Route::get('/', function () {
    return view('welcome');
});


Route::controller(LearningController::class)->group(function (){
    Route::get('avg' ,'average')->name('avg');
});
