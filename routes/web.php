<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\DetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('biodata.index'));

Route::resource('biodata', BiodataController::class)
    ->parameters(['biodata' => 'biodata']);

Route::post('biodata/{biodata}/detail/{type}', [DetailController::class, 'store'])
    ->name('detail.store');
Route::delete('detail/{type}/{id}', [DetailController::class, 'destroy'])
    ->name('detail.destroy');
