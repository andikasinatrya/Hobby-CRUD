<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbyController;

Route::get('/', [HobbyController::class, 'index'])->name('hobbies.index');

Route::resource('hobbies', HobbyController::class)->except(['index']);

