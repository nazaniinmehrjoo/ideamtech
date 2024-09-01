<?php

use App\Http\Controllers\ContactController;


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

Route::get('/تامین قطعات/خدمات',function(){
    return view('khadamat.taminghatat');
});

Route::get('/خدمات مهندسی/خدمات',function(){
    return view('khadamat.khadamat-mohandesi');
});

Route::get('/نصب و راه اندازی/خدمات',function(){
    return view('khadamat.nasbvarahandazi');
});

Route::get('/خدمات پس از فروش/خدمات',function(){
    return view('khadamat.khadamat-pasazforosh');
});



Route::get('/ماشین آلات فرآوری و شکل دهی/محصولات',function(){
    return view('mahsolat.mashinAlatShekldehi');
});

Route::get('/ماشین آلات و تجهیزات/محصولات',function(){
    return view('mahsolat.mashinalatvatajhizat');
});

Route::get('/خشک-کن/محصولات',function(){
    return view('mahsolat.khoskkon');
});

Route::get('/کوره پخت/محصولات',function(){
    return view('mahsolat.korepokht');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/درباره-ما',function(){
    return view('about');
});
Route::Post('/contact',[ContactController::class,'store']);