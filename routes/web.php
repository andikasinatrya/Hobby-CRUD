<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\StudentController;

// // Default route akan redirect ke /hobbies
// Route::get('/', function () {
//     return redirect('/hobbies');
// });

Route::resource('hobbies', HobbyController::class);
Route::resource('students', StudentController::class);

