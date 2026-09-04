<?php

use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PracticeAreaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TrackRecordController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles/{blogPost:slug}', [HomeController::class, 'article'])->name('articles.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin auth
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.attempt');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin panel (protected)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('practice-areas', PracticeAreaController::class)->except('show');
    Route::resource('team-members', TeamMemberController::class)->except('show');
    Route::resource('track-records', TrackRecordController::class)->except('show');
    Route::resource('testimonials', TestimonialController::class)->except('show');
    Route::resource('blog-posts', BlogPostController::class)->except('show');
    Route::resource('faqs', FaqController::class)->except('show');

    Route::get('messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::delete('messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
});
