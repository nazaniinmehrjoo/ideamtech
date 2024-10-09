<?php

// use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerFormController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
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

Route::get('/مشاوره/خدمات', [ServiceController::class, 'consulting'])->name('services.consulting');

Route::get('/تامین_قطعات/خدمات', [ServiceController::class, 'partsRepairs'])->name('services.partsRepairs');

Route::get('/خدمات_مهندسی/خدمات', [ServiceController::class, 'engineering'])->name('services.engineering');

Route::get('/نصب_و_راه_اندازی/خدمات', [ServiceController::class, 'installation'])->name('services.installation');

Route::get('/خدمات_پس_از_فروش/خدمات', [ServiceController::class, 'afterSales'])->name('services.afterSales');

// Publicly accessible routes for product listings
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin-only routes (Protected by isAdmin middleware)
Route::middleware(['isAdmin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', ServiceController::class);
    Route::resource('customer', CustomerFormController::class);
    Route::post('/customer/export', [CustomerFormController::class, 'export'])->name('customer.export');
});

Route::get('/no-access', function () {
    return view('no-access');  
})->name('no-access');




