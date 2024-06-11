<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Checkout;
use App\Livewire\Home;
use App\Livewire\Keranjang;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('login', Login::class)->name('auth.login');
        Route::get('register', Register::class)->name('auth.register');
        Route::get('forgot-password', ForgotPassword::class)->name('auth.forgot_password');
    });
});

Route::get('/', Home::class)->name('home');

Route::prefix('products')->group(function () {
    Route::get('', \App\Livewire\Products\Index::class)->name('products.index');
    Route::get('liga/{ligaId}', \App\Livewire\Products\Liga::class)->name('products.liga');
    Route::get('{productId}', \App\Livewire\Products\Show::class)->name('products.show');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', LogoutController::class)->name('auth.logout');
    });

    Route::get('/keranjang', Keranjang::class)->name('keranjang');
    Route::get('/checkout', Checkout::class)->name('checkout');

    Route::prefix('history')->group(function () {
        Route::get('', \App\Livewire\History\Index::class)->name('history.index');
        Route::get('{pesananId}', \App\Livewire\History\Show::class)->name('history.show');
    });

});
