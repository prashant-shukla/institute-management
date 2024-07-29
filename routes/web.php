<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', [HomeController::class, 'main']);
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
// Route::get('/courses', function () {
//     return view('courses'); // Ensure the view file is named correctly, e.g., resources/views/courses.blade.php
// })->name('courses');

Route::get('/course-details', function () {
    return view('course-details'); // Ensure the view file is named correctly, e.g., resources/views/courses.blade.php
})->name('ccourse-details');

Route::get('/storage-link', [CacheController::class, 'storageLink']);
Route::get('/clear-cache', [CacheController::class, 'clearCache']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
