<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'Home']);
Route::get('/categories', [HomeController::class, 'category'])->name('category');
Route::get('/filter-courses', [HomeController::class, 'filterCourses'])->name('filter.courses');
Route::get('/course/{slug}/{id}', [HomeController::class, 'Course'])->name('course');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/event', [HomeController::class, 'event'])->name('event');