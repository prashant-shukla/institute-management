<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Home', [HomeController::class, 'Home']);
Route::get('/category', [HomeController::class, 'category'])->name('category');
