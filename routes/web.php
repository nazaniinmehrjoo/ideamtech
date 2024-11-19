<?php

use App\Http\Controllers\CooperationController;
use App\Http\Controllers\CustomerFormController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\EmploymentFormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Route
Route::get('/', function () {
    return view('index');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/شبیه-ساز', function () {
    return view('simulator');
});
Route::get('/notfound', function () {
    return view('404');
})->name('notfound');

Route::get('/متمایزازدیگران', function () {
    return view('distinct');
});

Route::get('cooperations/create', [CooperationController::class, 'create'])->name('cooperations.create');
Route::post('cooperations', [CooperationController::class, 'store'])->name('cooperations.store');

Route::get('employment-forms/create', [EmploymentFormController::class, 'create'])->name('employment-forms.create');
Route::post('employment-forms', [EmploymentFormController::class, 'store'])->name('employment-forms.store');


Route::get('/پیوستن-به-خانواده-برناگستر', function () {
    return view('forms.form-selection');
});


// Blog Routes
Route::get('/مقالات', [BlogController::class, 'publicIndex'])->name('blog.publicIndex');
Route::get('/مقالات/{id}', [BlogController::class, 'show'])->name('blog.show'); 

// Track product clicks
Route::post('/products/{product}/click', [ProductController::class, 'trackClick'])->name('products.trackClick');

// Track user time spent on the site
Route::post('/track-time-spent', [TrackingController::class, 'trackTimeSpent']);

// Admin Dashboard Route - This is the main dashboard route showing visits data
Route::get('/admin/dashboard', [DashboardController::class, 'showDashboard'])->name('admin.dashboard');

// Public "Our Clients" Page
Route::get('/مشتریان-ما', [ProjectController::class, 'customerView']);

// Projects Management (admin protected)
Route::resource('projects', ProjectController::class);

// Service-related routes
Route::get('/مشاوره/خدمات', [ServiceController::class, 'consulting'])->name('services.consulting');
Route::get('/تامین_قطعات/خدمات', [ServiceController::class, 'partsRepairs'])->name('services.partsRepairs');
Route::get('/خدمات_مهندسی/خدمات', [ServiceController::class, 'engineering'])->name('services.engineering');
Route::get('/نصب_و_راه_اندازی/خدمات', [ServiceController::class, 'installation'])->name('services.installation');
Route::get('/خدمات_پس_از_فروش/خدمات', [ServiceController::class, 'afterSales'])->name('services.khadamat-pasazforosh');

// Publicly accessible routes for product listings
Route::get('/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات', [ProductController::class, 'mashinAlatShekldehi'])->name('products.mashinAlatShekldehi');
Route::get('/ماشین_آلات_و_تجهیزات/محصولات', [ProductController::class, 'mashinalatvatajhizat'])->name('products.mashinalatvatajhizat');
Route::get('/خشک-کن/محصولات', [ProductController::class, 'khoskkon'])->name('products.khoskkon');
Route::get('/کوره_پخت/محصولات', [ProductController::class, 'korepokht'])->name('products.korepokht');

// Contact and About Routes
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/درباره-ما', function () {
    return view('about');
});

// Authentication Routes
Auth::routes();

// Home Route (After login)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin-only routes (Protected by isAdmin middleware)
Route::middleware(['isAdmin'])->group(function () {

    // Dashboard route for admins - Protected
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

    // Admin CRUD routes
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('customer', CustomerFormController::class);
    Route::get('/dashboard/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::resource('blog', BlogController::class)->except(['index', 'show']);

    Route::get('cooperations', [CooperationController::class, 'index'])->name('cooperations.index');
    Route::get('cooperations/{id}/edit', [CooperationController::class, 'edit'])->name('cooperations.edit');
    Route::put('cooperations/{id}', [CooperationController::class, 'update'])->name('cooperations.update');
    Route::delete('cooperations/{id}', [CooperationController::class, 'destroy'])->name('cooperations.destroy');

    Route::get('employment-forms', [EmploymentFormController::class, 'index'])->name('employment-forms.index');
    Route::get('employment-forms/{id}/edit', [EmploymentFormController::class, 'edit'])->name('employment-forms.edit');
    Route::put('employment-forms/{id}', [EmploymentFormController::class, 'update'])->name('employment-forms.update');
    Route::delete('employment-forms/{id}', [EmploymentFormController::class, 'destroy'])->name('employment-forms.destroy');
    



    // Customer export functionality
    Route::post('/customer/export', [CustomerFormController::class, 'export'])->name('customer.export');

    // Blog management for admins
    
});

// No-access route for users without admin privileges
Route::get('/no-access', function () {
    return view('no-access');  
})->name('no-access');
