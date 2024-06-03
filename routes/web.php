<?php

use Illuminate\Support\Facades\Route;
// Route::get('/events', function () {
//     return view('events');
// });

Route::get('/events', function () {
    return view('events');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/events/show', [App\Http\Controllers\EventController::class, 'show'])->name('events.show');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
