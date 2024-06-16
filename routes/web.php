<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Merchant\DashboardController;
use App\Http\Controllers\Merchant\MerchantEventController;
use App\Http\Controllers\Merchant\MerchantAuthController;
use App\Http\Controllers\Merchant\MerchantProfileController;
use App\Http\Controllers\Merchant\OrderController;
use App\Http\Controllers\Merchant\PromotionController;
use Illuminate\Support\Facades\Route;

Route::get('/events', function () {
    return view('events');
});
Route::get('/', function () {
    return view('welcome');
});


Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/show', [EventController::class, 'show'])->name('events.show');

//Auth::routes();
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::post('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('auth.register');

Route::post('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::prefix('merchant')->group(function() {

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
