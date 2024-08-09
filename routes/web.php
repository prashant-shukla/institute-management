<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Home', [HomeController::class, 'Home']);
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/filter-courses', [HomeController::class, 'filterCourses'])->name('filter.courses');
Route::get('/Course', [HomeController::class, 'Course']);