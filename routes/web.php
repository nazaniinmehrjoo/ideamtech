<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerFormController;



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
Route::get('/مشاوره/خدمات',function(){
    return view('khadamat.moshavere');
});

Route::get('/تامین_قطعات/خدمات',function(){
    return view('khadamat.taminghatat');
});

Route::get('/خدمات_مهندسی/خدمات',function(){
    return view('khadamat.khadamat-mohandesi');
});

Route::get('/نصب_و_راه_اندازی/خدمات',function(){
    return view('khadamat.nasbvarahandazi');
});

Route::get('/خدمات_پس_از_فروش/خدمات',function(){
    return view('khadamat.khadamat-pasazforosh');
});



Route::get('/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات',function(){
    return view('mahsolat.mashinAlatShekldehi');
});

Route::get('/ماشین_آلات_و_تجهیزات/محصولات',function(){
    return view('mahsolat.mashinalatvatajhizat');
});

Route::get('/خشک-کن/محصولات',function(){
    return view('mahsolat.khoskkon');
});

Route::get('/کوره_پخت/محصولات',function(){
    return view('mahsolat.korepokht');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/درباره-ما',function(){
    return view('about');
});
Route::Post('/contact',[ContactController::class,'store']);


// Resource route for customer forms (this will include index, create, store, show, edit, update, destroy)
Route::resource('customer', CustomerFormController::class);

// Separate route for export functionality
Route::post('/customer/export', [CustomerFormController::class, 'export'])->name('customer.export');