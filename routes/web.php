<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\ContactController;
use Illuminate\Support\Facades\Artisan;
use App\Models\Blog;
use App\Http\Controllers\FeeReceiptController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PaymentController; // global / admin wala
use App\Http\Controllers\Student\PaymentController as StudentPaymentController; // student wala
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Student\StudentCertificateController;

use App\Http\Controllers\ExamCategoryController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\Student\ExamController as StudentExamController;
use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\AttendanceController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Student\LiveClassController as StudentLiveClassController;
use App\Http\Controllers\StudentRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




    Route::get('/', [HomeController::class, 'Homes'])->name('home');
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
    Route::post('/logout', [UserController::class, 'logout'])->name('web-logout');
    Route::view('/terms-and-conditions', 'terms')->name('terms.conditions');
    Route::view('/privacy-policy', 'privacy-policy')->name('privacy.policy');
    Route::view('/refund-policy', 'refund-policy')->name('refund.policy');

Route::post('/web-logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('web-logout');
 Route::get('/fees/print/{id}', [FeeReceiptController::class, 'print'])->name('fees.print');

Route::get('/payment/{course_id}', [PaymentController::class, 'createOrder'])
    ->middleware('auth:web')
    ->name('payment.page');
    Route::get('/payment/{exam_id}', [PaymentController::class, 'createOrder'])
    ->middleware('auth:web')
    ->name('payment.page');
    Route::get('/certificate/{id}', [CertificateController::class, 'show'])->name('certificate.show');
    Route::post('/course/{id}/order', [PaymentController::class, 'createOrder'])->name('course.order');
    Route::post('/course/payment/verify', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
// Route::get('/payment/{course_id}', [PaymentController::class, 'createOrder'])
//     ->name('payment.page');
    Route::post('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

    Route::view('/exam_result', 'exam.exam_result')->name('exam_result');
    Route::get('/exam/history', [ExamController::class, 'examHistory'])->name('exam.history');

    Route::get('/exam/{id}', [ExamController::class, 'show'])
        ->middleware('auth')
        ->name('exam.show');

    Route::post('/exam/save-answer', [ExamController::class, 'saveAnswer'])->name('exam.answer.save');
    Route::get('/exam/{examId}/submit', [ExamController::class, 'showResult'])->name('exam_result');

Route::get('/student/register', [StudentRegisterController::class, 'create'])
    ->name('student.register');

Route::post('/student/register', [StudentRegisterController::class, 'store'])
    ->name('student.register.store');




    // Show registration page
    Route::get('/register', [UserController::class, 'showRegister'])->name('register');

    // Handle form submission
    Route::post('/register', [UserController::class, 'storeRegister'])->name('register.store');





    // ✅ Frontend Exam Category Pages
    Route::get('/Exams', [ExamCategoryController::class, 'index'])->name('exam-categories.index');
    Route::get('/exams/{id}', [ExamCategoryController::class, 'show'])->name('exam-categories.show');


Route::prefix('student')->group(function () {

    // login routes
    // Route::get('/login',  [AuthController::class, 'showLogin'])->name('student.login');
    // Route::post('/login', [AuthController::class, 'login'])->name('student.login.submit');

    // protected routes
    // Route::middleware('auth')->group(function () {
    //     Route::get('/dashboard', [DashboardController::class, 'index'])
    //         ->name('student.dashboard');
    // });
});


Route::middleware('auth')->prefix('student')->name('student.')->group(function () {

 Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
    });
    Route::get('/attendance', [AttendanceController::class, 'create'])->name('attendance');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');

    // ✅ All Exams page

    Route::get('/exam/history', [StudentExamController::class, 'examHistory'])
        ->name('exam.history');
    Route::get('/exam', [StudentExamController::class, 'index'])->name('exams');
    Route::get('/exam/{id}', [StudentExamController::class, 'show'])->name('exam-categories.show');
    Route::get('/exam/{id}', [StudentExamController::class, 'show'])
        ->middleware('auth')
        ->name('exams.show');
    Route::get('/exams/{exam}/start', [StudentExamController::class, 'start'])
        ->name('exam.start');
    Route::get('/exam/{examId}/submit', [StudentExamController::class, 'showResult'])->name('exam_result');

    // ✅ Payments detail page
    Route::get('/payments', [StudentPaymentController::class, 'index'])
        ->name('payments');
    Route::get('/profile', [StudentProfileController::class, 'index'])->name('profile');

    Route::get('/live-classes', [StudentLiveClassController::class, 'index'])
        ->name('live');

        Route::get('payments/download', [StudentPaymentController::class, 'downloadPaymentsPdf'])
            ->name('payments.download');

        Route::get('/certificate', [StudentCertificateController::class, 'index'])
            ->name('certificate');

        Route::get('/certificate/download', [StudentCertificateController::class, 'download'])
            ->name('certificate.download');
//             Route::get('/feedback-form', [DashboardController::class, 'feedbackForm'])->name('feedback.form');
// Route::post('/feedback-submit', [DashboardController::class, 'store'])->name('feedback.store');
});





Route::post('/logout', [LogoutController::class, 'logout'])
    ->name('logout');
            Route::get('/feedback-form', [DashboardController::class, 'feedbackForm'])->name('feedback.form');
Route::post('/feedback-submit', [DashboardController::class, 'store'])->name('feedback.store');