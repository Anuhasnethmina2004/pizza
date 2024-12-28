<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FavoriteController;
Route::get('welcome', function () {
    return view('welcome');
});


// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/orders', [AdminController::class, 'index'])->name('admin.orders.index');
    Route::put('/admin/orders/{id}', [AdminController::class, 'updateStatus'])->name('admin.orders.update');
    Route::get('orders/{order}', [AdminController::class, 'showOrderDetails'])->name('admin.orders.details');
    Route::put('orders/{order}/update-delivery-status', [AdminController::class, 'updateStatus'])->name('admin.orders.update.delivery');


// });

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');



Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Redirect to home after login
Route::get('/home', function () {
    return view('home'); // Replace with your home view
})->name('home');

// Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [OrderController::class, 'home'])->name('home');
    Route::get('order/create', [OrderController::class, 'createOrderForm'])->name('order.create');
    Route::post('order', [OrderController::class, 'createOrder'])->name('order.store');
    Route::get('order/{orderId}/track', [OrderController::class, 'trackOrder'])->name('order.track');
// });

Route::get('/', [OrderController::class, 'showPizzaBuilder'])->name('pizza.builder');
Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('pizza.add_to_cart');
Route::get('/cart', [OrderController::class, 'viewCart'])->name('cart.view');
// Route::post('/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
Route::get('/checkout', [OrderController::class, 'showCheckoutForm'])->name('cart.checkout_form');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
Route::delete('/cart/{id}', [OrderController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::post('/favorite/add', [FavoriteController::class, 'addFavorite'])->name('favorite.add');



Route::post('/cart/apply-discount', [OrderController::class, 'applyDiscount'])->name('cart.apply_discount');
// Route::post('/cart/checkout', [OrderController::class, 'checkout'])->name('cart.checkout');
