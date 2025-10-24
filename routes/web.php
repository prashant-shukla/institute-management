<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ContactController;
use Illuminate\Support\Facades\Artisan;
use App\Models\Blog;
use App\Http\Controllers\FeeReceiptController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ExamCategoryController;


Route::group(['middleware' => 'redirect.if.not.installed'], function () {
    
      Route::get('/', [HomeController::class, 'Homes']);
      Route::get('/Course', [HomeController::class, 'Courses']);
      Route::get('/Course_Detail', [HomeController::class, 'Course_Detail']);
      Route::get('/contacts', [HomeController::class, 'contacts']);
      Route::get('/events', [HomeController::class, 'Events']);
       Route::get('/Gallery', [HomeController::class, 'Gallery']);
       Route::get('/placement', [HomeController::class, 'placement']);
      Route::get('/categories', [HomeController::class, 'category'])->name('category');
      Route::get('/filter-courses', [HomeController::class, 'filterCourses'])->name('filter.courses');
      Route::get('/course/{slug}/{id}', [HomeController::class, 'Course'])->name('course');
      Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
      Route::get('/about-us', [HomeController::class, 'about'])->name('about');
   
      Route::post('/register-event', [App\Http\Controllers\EventRegistrationController::class, 'store'])->name('event.register');
      Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');

      Route::get('/blogs',  [HomeController::class, 'blog'])->name('blog');

      Route::get('/blogs/{slug}', [HomeController::class, 'show'])->name('blog.detail');
      Route::get('/register', [UserController::class, 'register'])->name('register');
      Route::post('/register', [UserController::class, 'storeRegister'])->name('register.store');  
      Route::get('/login', [UserController::class, 'login'])->name('login');
      Route::post('/login', [UserController::class, 'storeLogin'])->name('login.store');
      Route::post('/logout', [UserController::class, 'logout'])->name('logout');

      Route::get('/run-migrate', function () {
            Artisan::call('migrate', [
                '--force' => true, // required in production
            ]);
        
            return 'Migrations have been run successfully!';
        });
   

        Route::get('/seed', function () {
            Artisan::call('db:seed', [
                '--force' => true, // allow in production
            ]);
        
            return 'Database seeding completed!';
        });
        

        Route::get('/fees/print/{id}', [FeeReceiptController::class, 'print'])->name('fees.print');


Route::get('/certificate/{id}', [CertificateController::class, 'show'])->name('certificate.show');
Route::post('/course/{id}/order', [PaymentController::class, 'createOrder'])->name('course.order');
Route::post('/course/payment/verify', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
Route::view('/exam', 'exam.exam')->name('exam');
Route::view('/exam_result', 'exam.exam_result')->name('exam_result');







// ✅ Frontend Exam Category Pages
Route::get('/Exams', [ExamCategoryController::class, 'index'])->name('exam-categories.index');
Route::get('/exams/{id}', [ExamCategoryController::class, 'show'])->name('exam-categories.show');

});
