<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        "title" => "welcome"
    ]);
});


Auth::routes();

 // Route::post('/orders/{order}/first', [OrderController::class, 'storeFirst'])->name('order.storeFirst');

// Normal user
Route::middleware(['auth' , 'user-access:user, admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/user/order', [OrderController::class, 'index'])->name('orders.index');
    Route::post('user/orders/first', [OrderController::class, 'orderStepOne'])->name('order.storeFirst');

    Route::get('user/orders/{order_id}/step-two', [OrderController::class, 'orderStepTwo'])->name('order.StepTwo');
});

// Kurir user
Route::middleware(['auth' , 'user-access:kurir, admin'])->group(function () {
    Route::get('kurir/home', [HomeController::class, 'kurirhome'])->name('kurir.home');
});

// Admin user
Route::middleware(['auth' , 'user-access:admin'])->group(function () {
    Route::get('admin/home', [HomeController::class, 'adminhome'])->name('admin.home');
});
