<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Room;
use Gumlet\ImageResize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/rooms', [WelcomeController::class, 'index']);
Route::get('/room/booking/{id}', [WelcomeController::class, 'details'])->name('room_details');
Route::get('/contact/{id?}',[WelcomeController::class, 'contact'])->name('contact');
Route::post('/contact-send',[WelcomeController::class, 'contactSend']);
Route::get('/about', [WelcomeController::class, 'about']);
Route::get('/promotion', [WelcomeController::class, 'promotion']);
Route::get('/booking/{id}', [BookingController::class, 'booking']);
Route::post('/booking', [BookingController::class, 'store']);
Route::get('/info/{id}', [BookingController::class, 'info']);
Route::post('/payment', [BookingController::class, 'payment']);
Route::get('info/booking/cancel/{id}', [BookingController::class, 'bookingCancel']);


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//Booking
Route::get('find-room',[BookingController::class, 'findRoom']);


Route::middleware(['admin'])->prefix('admin')->group(function() {
    // Route::get('/', [AdminController::class, 'index']);
    Route::view('/', 'admin.revenue.index')->name('admin');
    Route::get('/revenue',[AdminController::class, 'getRevenueData']);
    //Rooms
    Route::prefix('room')->group(function() {
      Route::get('/', [RoomController::class, 'index'])->name('rooms');
      Route::match(['get', 'post'],'add-edit/{id?}', [RoomController::class, 'addEdit']);
      Route::get('details/{id}', [RoomController::class, 'details']);
      Route::get('delete/{id}', [RoomController::class, 'destroy']);
    });
    //Amenities
    Route::prefix('amenity')->group(function() {
      Route::get('/', [AmenityController::class, 'index'])->name('amenities');
      Route::match(['get', 'post'],'add-edit/{id?}', [AmenityController::class, 'addEdit']);
      Route::get('delete/{id}', [AmenityController::class, 'destroy']);
    });
    //Promotions
    Route::prefix('promotion')->group(function() {
      Route::get('/', [PromotionController::class, 'index'])->name('promotions');
      Route::match(['get', 'post'],'add-edit/{id?}', [PromotionController::class, 'addEdit']);
      Route::get('details/{id}', [PromotionController::class, 'details']);
      Route::get('delete/{id}', [PromotionController::class, 'destroy']);
      Route::get('details/{id}', [PromotionController::class, 'details']);
      Route::get('delete/{id}', [PromotionController::class, 'destroy']);
    });
    //Contacts
    Route::prefix('contact')->controller(ContactController::class)->group(function() {
      Route::get('/','index')->name('contacts');
      Route::post('/update-contact-status', 'updateContactStatus');
      Route::get('delete/{id}', 'destroy');
    });
    //Abouts
    Route::prefix('about')->controller(AboutController::class)->group(function() {
      Route::get('/','index')->name('abouts');
      Route::match(['get', 'post'],'add-edit/{id?}', 'addEdit');
      Route::get('delete/{id}', 'destroy');
    });
    //Bookings
    Route::prefix('booking')->controller(AdminBookingController::class)->group(function() {
      Route::get('/', 'index')->name('bookings');
      Route::get('details/{id}', 'details');
      Route::get('print/{id}', 'print');
    });
});
