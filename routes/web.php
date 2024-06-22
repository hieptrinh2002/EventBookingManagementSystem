<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Merchant\DashboardController;
use App\Http\Controllers\Merchant\MerchantEventController;
use App\Http\Controllers\Merchant\MerchantAuthController;
use App\Http\Controllers\Merchant\MerchantProfileController;
use App\Http\Controllers\Merchant\OrderController;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Merchant\PromotionController;
use App\Http\Controllers\CheckoutController;

use Illuminate\Support\Facades\Route;

Route::get('/events', function () {
    return view('events');
});

Route::get('/', function () {return view('welcome');})-> name('welcome.index');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::post('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::prefix('merchant')->group(function () {

    Route::get('register', [MerchantAuthController::class, 'showRegisterForm'])->name('merchant.pages.register');
    Route::post('register', [MerchantAuthController::class, 'register'])->name('merchant.register');
    Route::get('login', [MerchantAuthController::class, 'showLoginForm'])->name('merchant.pages.login');
    Route::post('login', [MerchantAuthController::class, 'login'])->name('merchant.login');
    Route::get('logout', [MerchantAuthController::class, 'logout'])->name('merchant.logout');

    Route::middleware(['ensure.token'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('merchant.dashboard.index');
        Route::get('profile', [MerchantProfileController::class, 'show'])->name('merchant.profile.show');

        Route::resource('events', MerchantEventController::class)->names([
            'index' => 'merchant.events.index',
            'create' => 'merchant.events.create',
            'store' => 'merchant.events.store',
            'edit' => 'merchant.events.edit',
            'update' => 'merchant.events.update',
            Route::get('{event}/orders', [OrderController::class, 'index'])->name('events.orders.index')
        ]);

        Route::resource('promotions', PromotionController::class)->names([
            'index' => 'merchant.promotions.index',
            'create' => 'merchant.promotions.create',
            'store' => 'merchant.promotions.store',
            'edit' => 'merchant.promotions.edit',
            'update' => 'merchant.promotions.update',
        ]);
    });
});


// Route to display the checkout page
Route::get('/checkout/{eventId}', [CheckoutController::class, 'index']);

// Route to submit an orders
Route::post('/checkout/{eventId}', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

Route::get('/error', [\App\Http\Controllers\ErrorController::class, 'index']);

Route::get('/account', [AccountController::class, 'index'])->name("account.info");
