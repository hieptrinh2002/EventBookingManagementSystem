<?php

use App\Http\Controllers\Merchant\EventController;
use App\Http\Controllers\Merchant\PromotionController;
use Illuminate\Support\Facades\Route;

Route::get('/events', function () {
    return view('events');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('merchant.dashboard.index');
})->name('merchant.dashboard');

Route::get('/admin-portal', function () {
    return view('admin-portal.dashboard');
})->name('admin-portal.dashboard');

Route::get('/admin-portal/create-event', function () {
    return view('admin-portal.create-event');
})->name('admin-portal.create-event');

Route::get('/admin-portal/edit-event', function () {
    return view('admin-portal.edit-event');
})->name('admin-portal.edit-event');

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/events/show', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');

//Auth::routes();
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::post('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

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
