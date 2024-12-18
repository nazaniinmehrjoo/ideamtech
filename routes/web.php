<?php

use App\Http\Controllers\{
    BlogController,
    CategoryController,
    CooperationController,
    CustomerFormController,
    DashboardController,
    EmploymentFormController,
    ProductController,
    ProjectController,
    ServiceController,
    TrackingController
};
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Language Switching Route
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fa'])) {
        session(['locale' => $locale]); // Save the locale in the session
        app()->setLocale($locale); // Set the locale for the application
    }
    return redirect()->back(); // Redirect back to the previous page
})->name('setLanguage');

// Redirect to default locale if no locale is provided
Route::get('/', function () {
    return redirect(app()->getLocale()); // Redirect to the app's default locale
});

// Routes with locale prefix
Route::group(['prefix' => '{locale}', 'middleware' => 'locale'], function () {

    // Static Pages
    Route::view('/', 'index')->name('home');
    Route::view('/info', 'info')->name("info");
    Route::view('/شبیه-ساز', 'simulator')->name("simulator");
    Route::view('/متمایزازدیگران', 'distinct')->name("distinct");
    Route::view('/پیوستن-به-خانواده-برناگستر', 'forms.form-selection')->name("form-selection");
    Route::view('/join-borna-gostar-family', 'forms.form-selection')->name('join-family');

    Route::view('/خط-کامل-آجر/محصولات', 'products.turnkeysolution')->name('products.turnkeysolution');
    Route::view('/contact', 'contact')->name("contact");
    Route::view('/درباره-ما', 'about')->name("about");

    // Error and Access Handling
    Route::view('/notfound', '404')->name('notfound');
    Route::view('/no-access', 'no-access')->name('no-access');

    // Blog Routes
    Route::get('/مقالات', [BlogController::class, 'publicIndex'])->name('blog.blogs');
    Route::get('/مقالات/{post}', [BlogController::class, 'show'])->name('blog.show');

    // Product Click Tracking
    Route::post('/products/{product}/click', [ProductController::class, 'trackClick'])->name('products.trackClick');

    // User Time Tracking
    Route::post('/track-time-spent', [TrackingController::class, 'trackTimeSpent']);

    // Public "Our Clients" Page
    Route::get('/مشتریان-ما', [ProjectController::class, 'customerView'])->name('projects.projects');

    // Service Routes
    Route::get('/مشاوره/خدمات', [ServiceController::class, 'consulting'])->name('services.consulting');
    Route::get('/تامین_قطعات/خدمات', [ServiceController::class, 'partsRepairs'])->name('services.partsRepairs');
    Route::get('/خدمات_مهندسی/خدمات', [ServiceController::class, 'engineering'])->name('services.engineering');
    Route::get('/نصب_و_راه_اندازی/خدمات', [ServiceController::class, 'installation'])->name('services.installation');
    Route::get('/خدمات_پس_از_فروش/خدمات', [ServiceController::class, 'afterSales'])->name('services.khadamat-pasazforosh');

    // Publicly Accessible Product Listings
    Route::get('/ماشین_آلات_فرآوری_و_شکل_دهی/محصولات', [ProductController::class, 'mashinAlatShekldehi'])->name('products.mashinAlatShekldehi');
    Route::get('/ماشین_آلات_و_تجهیزات/محصولات', [ProductController::class, 'mashinalatvatajhizat'])->name('products.mashinalatvatajhizat');
    Route::get('/خشک-کن/محصولات', [ProductController::class, 'khoskkon'])->name('products.khoskkon');
    Route::get('/کوره_پخت/محصولات', [ProductController::class, 'korepokht'])->name('products.korepokht');

    // Categories Resource Route
    Route::resource('categories', CategoryController::class)->parameters([
        'categories' => 'category',
    ]);

    // Employment and Cooperation Forms
    Route::get('cooperations/create', [CooperationController::class, 'create'])->name('cooperations.create');
    Route::post('cooperations', [CooperationController::class, 'store'])->name('cooperations.store');
    Route::get('employment-forms/create', [EmploymentFormController::class, 'create'])->name('employment-forms.create');
    Route::post('employment-forms', [EmploymentFormController::class, 'store'])->name('employment-forms.store');

    // Authentication Routes
    Auth::routes();

    // Admin-Only Routes
    Route::middleware(['auth', 'isAdmin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

        // Resource Management
        Route::resources([
            'products' => ProductController::class,
            'services' => ServiceController::class,
            'projects' => ProjectController::class,
            'customer' => CustomerFormController::class,
        ]);

        // Blog Management
        Route::get('/dashboard/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::resource('blog', BlogController::class)->except(['index', 'show']);

        // Export Customers
        Route::post('/customer/export', [CustomerFormController::class, 'export'])->name('customer.export');

        // Cooperation and Employment Forms
        Route::get('cooperations', [CooperationController::class, 'index'])->name('cooperations.index');
        Route::get('cooperations/{id}/edit', [CooperationController::class, 'e dit'])->name('cooperations.edit');
        Route::put('cooperations/{id}', [CooperationController::class, 'update'])->name('cooperations.update');
        Route::delete('cooperations/{id}', [CooperationController::class, 'destroy'])->name('cooperations.destroy');

        Route::get('employment-forms', [EmploymentFormController::class, 'index'])->name('employment-forms.index');
        Route::get('employment-forms/{id}/edit', [EmploymentFormController::class, 'edit'])->name('employment-forms.edit');
        Route::put('employment-forms/{id}', [EmploymentFormController::class, 'update'])->name('employment-forms.update');
        Route::delete('employment-forms/{id}', [EmploymentFormController::class, 'destroy'])->name('employment-forms.destroy');
    });

    // Fallback Route for Undefined Routes
    Route::fallback(function () {
        $locale = request()->route('locale') ?? app()->getLocale();
        return redirect()->route('notfound', ['locale' => $locale]);
    });
    
});
