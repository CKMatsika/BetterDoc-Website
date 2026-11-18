<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

// Public
Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/features', [SiteController::class, 'features'])->name('features');
Route::get('/solutions/defence-government', [SiteController::class, 'solutionsDefence'])->name('solutions.defence');
Route::get('/solutions/banking-finance', [SiteController::class, 'solutionsBanking'])->name('solutions.banking');
Route::get('/solutions/corporate', [SiteController::class, 'solutionsCorporate'])->name('solutions.corporate');
Route::get('/security', [SiteController::class, 'security'])->name('security');
Route::get('/deployment', [SiteController::class, 'deployment'])->name('deployment');
Route::get('/how-we-work', [SiteController::class, 'howWeWork'])->name('how-we-work');
Route::get('/faq', [SiteController::class, 'faq'])->name('faq');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
Route::get('/thank-you', [SiteController::class, 'thankYou'])->name('thank-you');
Route::get('/privacy', [SiteController::class, 'privacy'])->name('privacy');
Route::get('/terms', [SiteController::class, 'terms'])->name('terms');

// SEO
Route::get('/sitemap.xml', function () {
    return response()->view('seo.sitemap', [], 200)->header('Content-Type', 'application/xml');
})->name('sitemap');
Route::get('/robots.txt', function () {
    return response(view('seo.robots'), 200)->header('Content-Type', 'text/plain');
})->name('robots');

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
        Route::get('/leads/export', [LeadController::class, 'export'])->name('leads.export');
        Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
        Route::patch('/leads/{lead}/contacted', [LeadController::class, 'markContacted'])->name('leads.contacted');
    });
});
