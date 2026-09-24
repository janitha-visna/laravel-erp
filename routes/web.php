<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return redirect()->route('items.index');
})->name('dashboard');

Route::resource('items', ItemController::class);
