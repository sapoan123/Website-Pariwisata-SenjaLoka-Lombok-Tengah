<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Models\Destination;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $destinations = Destination::where('status', 'approved')->where('category', 'pantai')->latest()->get();
    $bukitDestinations = Destination::where('status', 'approved')->whereIn('category', ['bukit', 'air terjun'])->get();
    $galleries = Gallery::where('status', 'approved')->latest()->take(8)->get();
    $testimonials = Testimonial::where('status', 'approved')->latest()->take(6)->get();

    return view('home', compact('destinations', 'bukitDestinations', 'galleries', 'testimonials'));
})->name('home');

Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::post('/testimonial', [TestimonialController::class, 'publicStore'])->name('testimonial.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.post');
Route::get('/admin/register', [AuthController::class, 'showAdminRegister'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'adminRegister'])->name('admin.register.post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
    Route::get('/destinations/submit', [DestinationController::class, 'showSubmitForm'])->name('destinations.submit');
    Route::post('/destinations/submit', [DestinationController::class, 'userStore'])->name('destinations.user.store');
    Route::get('/galleries/submit', [GalleryController::class, 'showUserForm'])->name('galleries.submit');
    Route::post('/galleries/submit', [GalleryController::class, 'userStore'])->name('galleries.user.store');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'adminDashboard'])->name('dashboard');
        Route::get('/destinations/bukit-air-terjun', [DestinationController::class, 'hillWaterfall'])->name('destinations.bukit');
        Route::resource('/destinations', DestinationController::class);
        Route::post('/destinations/{destination}/approve', [DestinationController::class, 'approve'])->name('destinations.approve');
        Route::post('/destinations/{destination}/reject', [DestinationController::class, 'reject'])->name('destinations.reject');
        Route::resource('/galleries', GalleryController::class);
        Route::post('/galleries/{gallery}/approve', [GalleryController::class, 'approve'])->name('galleries.approve');
        Route::post('/galleries/{gallery}/reject', [GalleryController::class, 'reject'])->name('galleries.reject');
        Route::resource('/testimonials', TestimonialController::class)->except(['show']);
        Route::post('/testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');
        Route::get('/users', [AuthController::class, 'users'])->name('users.index');
        Route::get('/users/{user}/edit', [AuthController::class, 'editUser'])->name('users.edit');
        Route::put('/users/{user}', [AuthController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{user}', [AuthController::class, 'destroyUser'])->name('users.destroy');
    });
});
