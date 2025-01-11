<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PersonesController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TelephoneController;

Route::get('/', [AuthController::class, 'showRegistrasi'])->name('home');

Route::get('/registrasi', [AuthController::class, 'showRegistrasi'])->name('registrasi.show');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])
     ->name('login.submit')
     ->middleware('throttle:5,1');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('hobbies', HobbyController::class);
Route::resource('students', StudentController::class);
Route::resource('persones', PersonesController::class);
Route::resource('telephones', TelephoneController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('siswas', SiswaController::class);
});
