<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\ContactController;

Route::group(['middleware' => 'redirect.if.not.installed'], function () {
      Route::get('/', [HomeController::class, 'Home']);
      Route::get('/Home', [HomeController::class, 'Homes']);
      Route::get('/Course', [HomeController::class, 'Courses']);
      Route::get('/Course_Detail', [HomeController::class, 'Course_Detail']);
      Route::get('/contacts', [HomeController::class, 'contacts']);
      Route::get('/events', [HomeController::class, 'Events']);
      Route::get('/categories', [HomeController::class, 'category'])->name('category');
      Route::get('/filter-courses', [HomeController::class, 'filterCourses'])->name('filter.courses');
      Route::get('/course/{slug}/{id}', [HomeController::class, 'Course'])->name('course');
      Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
      Route::get('/about-us', [HomeController::class, 'about'])->name('about');
      Route::get('/event', [HomeController::class, 'event'])->name('event');
      Route::post('/register-event', [App\Http\Controllers\EventRegistrationController::class, 'store'])->name('event.register');
      Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
});
