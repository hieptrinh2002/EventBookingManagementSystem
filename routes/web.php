<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Merchant\EventController;
use App\Http\Controllers\Merchant\PromotionController;
use App\Http\Controllers\CheckoutController;

use Illuminate\Support\Facades\Route;

Route::get('/events', function () {
    return view('events');
});

Route::get('/', function () {
    return view('welcome');
})-> name('welcome.index');

Route::get('/dashboard', function () {
    return view('merchant.dashboard.index');
})->name('merchant.dashboard');


Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/events/show', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');

Route::get('/auth/login', [LoginController::class, 'login'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login']);

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::post('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('merchant')->group(function () {
    // Route::get('/', [MerchantController::class, 'index'])->name('merchant.index');

    Route::resource('events', EventController::class)->names([
        'index' => 'merchant.events.index',
        'create' => 'merchant.events.create',
        'store' => 'merchant.events.store',
        'show' => 'merchant.events.show',
        'edit' => 'merchant.events.edit',
        'update' => 'merchant.events.update',
        'destroy' => 'merchant.events.destroy',
    ]);

    Route::resource('promotions', PromotionController::class)->names([
        'index' => 'merchant.promotions.index',
        'create' => 'merchant.promotions.create',
        'store' => 'merchant.promotions.store',
        'show' => 'merchant.promotions.show',
        'edit' => 'merchant.promotions.edit',
        'update' => 'merchant.promotions.update',
        'destroy' => 'merchant.promotions.destroy',
    ]);

});


// Route to display the checkout page
Route::get('/checkout/{eventId}', [CheckoutController::class,'index']);

// Route to submit an orders
Route::post('/checkout/{eventId}', [CheckoutController::class, 'processCheckout']);

Route::get('/error', [\App\Http\Controllers\ErrorController::class,'index']);

Route::get('/account', [AccountController::class,'index'])->name("account.info");
