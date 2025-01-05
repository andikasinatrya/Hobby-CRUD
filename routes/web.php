<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\PersonesController;

// Route::get('/', function () {
//     return redirect('/hobbies');
// });

Route::resource('hobbies', HobbyController::class);
Route::resource('students', StudentController::class);
Route::resource('persones', PersonesController::class);
Route::resource('telephones', TelephoneController::class);
