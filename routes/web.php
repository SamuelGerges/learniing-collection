<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearningController;


Route::get('/', function () {
    return view('welcome');
});


Route::controller(LearningController::class)->group(function () {
    Route::get('avg', 'average')->name('avg');
    Route::get('max', 'maximum')->name('max');
    Route::get('median', 'median')->name('median');
    Route::get('min', 'minimum')->name('minimum');
    Route::get('collapse', 'collapsee')->name('collapse');
    Route::get('chunk', 'chunks')->name('chunk');
    Route::get('combine', 'combine')->name('combine');
    Route::get('concat', 'concat')->name('concat');
    Route::get('contains', 'contains')->name('contains');
    Route::get('count', 'countCollection')->name('count');
    Route::get('diff', 'diff')->name('diff');
    Route::get('diff-assoc', 'diffAssoc')->name('diff-assoc');
    Route::get('diff-keys', 'diffkeys')->name('diff-keys');
    Route::get('diff-using', 'diffUsing')->name('diff-using');
    Route::get('cross-join', 'cross_Join')->name('cross-join');
    Route::get('tab', 'tab')->name('tab');
    Route::get('map', 'map')->name('map');
    Route::get('map-keys', 'mapWithKeys')->name('map-keys');
    Route::get('map-into', 'mapInto')->name('map-into');
    Route::get('map-spread', 'mapSpread')->name('map-spread');
    Route::get('map-to-dictionary', 'mapToDictionary')->name('map-to-dictionary');
    Route::get('map-to-groups', 'mapToGroups')->name('map-to-groups');
    Route::get('where', 'where')->name('where');
    Route::get('where-strict', 'whereStrict')->name('where-strict');
    Route::get('where-in-strict', 'whereInStrict')->name('where-in-strict');
    Route::get('where-not-in-strict', 'whereNotInStrict')->name('where-not-in-strict');
    Route::get('where-in', 'whereIn')->name('where-in');
    Route::get('where-not-in', 'whereNotIn')->name('where-not-in');
    Route::get('where-between', 'whereBetween')->name('where-between');
    Route::get('where-not-between', 'whereNotBetween')->name('where-not-between');
    Route::get('wrap','wrap')->name('wrap');
    Route::get('filter','filter')->name('filter');
    Route::get('pluck','pluck')->name('pluck');
    Route::get('first-where','firstWhere')->name('first-where');
    Route::get('zip','zip')->name('zip');
    Route::get('sort','sort')->name('sort');
    Route::get('sortBy','sortBy')->name('sortBy');
    Route::get('groupBy','groupBy')->name('groupBy');
    Route::get('first','first')->name('first');
    Route::get('last','last')->name('last');
    Route::get('isEmpty','isEmpty')->name('isEmpty');
    Route::get('isNotEmpty','isNotEmpty')->name('isNotEmpty');
    Route::get('reverse','reverse')->name('reverse');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
