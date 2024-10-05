<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerFormController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/مشاوره/خدمات', function () {
    return view('khadamat.moshavere');
});

Route::get('/تامین_قطعات/خدمات', function () {
    return view('khadamat.taminghatat');
});

Route::get('/خدمات_مهندسی/خدمات', function () {
    return view('khadamat.khadamat-mohandesi');
});

Route::get('/نصب_و_راه_اندازی/خدمات', function () {
    return view('khadamat.nasbvarahandazi');
});

Route::get('/خدمات_پس_از_فروش/خدمات', function () {
    return view('khadamat.khadamat-pasazforosh');
});

// Update product-related routes to fetch products dynamically from the database
Route::get('/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات', [ProductController::class, 'mashinAlatShekldehi'])->name('products.mashinAlatShekldehi');
Route::get('/ماشین_آلات_و_تجهیزات/محصولات', [ProductController::class, 'mashinalatvatajhizat'])->name('products.mashinalatvatajhizat');
Route::get('/خشک-کن/محصولات', [ProductController::class, 'khoskkon'])->name('products.khoskkon');
Route::get('/کوره_پخت/محصولات', [ProductController::class, 'korepokht'])->name('products.korepokht');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/درباره-ما', function () {
    return view('about');
});

Route::post('/contact', [ContactController::class, 'store']);

// Customer routes
Route::resource('customer', CustomerFormController::class);
Route::post('/customer/export', [CustomerFormController::class, 'export'])->name('customer.export');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Products resourceful routes
Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);
