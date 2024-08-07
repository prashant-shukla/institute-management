<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Home', [HomeController::class, 'Home']);
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
