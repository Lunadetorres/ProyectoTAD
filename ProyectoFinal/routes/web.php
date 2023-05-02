<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Laravel\Fortify\Features;

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/productos', [ProductosController::class, 'index'])->name('productos');

Route::get('/home', [ProductosController::class, 'index'])->name('productos');

Route::get('/productos/edit/{id}', [ProductosController::class, 'edit'])->name('productos.editar');

Route::post('/favoritos/add/{id}', [FavoritosController::class, 'addToFavoritos'])->name('favoritos.add');

Route::get('/favoritos', [FavoritosController::class, 'index'])->name('favoritos.index');

Route::post('/favoritos/destroy/{id}', [FavoritosController::class, 'destroy'])->name('favoritos.destroy');

Route::get('/usuario', [UsuarioController::class, 'index'])->name('perfil.index');

Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/reset-password', function () {
    return view('reset-password');
})->name('password.update');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('password.request');

Route::get('/verify-email', function () {
    return view('verify-email');
})->name('verify-email');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/language/{language}', [LanguageController::class, 'changeLanguage'])->name('language.change');

Route::get('/{locale?}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.available_locales'))) {
        app()->setLocale($locale);
    }

    return view('welcome');
});

Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');

Route::post('/cart/update/{cartItemId}', [CartController::class, 'update'])->name('cart.update');

Route::post('cart/remove/{cartItemId}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::get('/checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');

Route::get('/checkout/success{pedidoId}{totalPrice}', [CheckoutController::class, 'success'])->name('checkout.success');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/crear-producto', [ProductosController::class, 'create'])->name('admin.crear-producto');
    Route::get('admin/store-producto', [ProductosController::class, 'store'])->name('admin.store-producto');
});
