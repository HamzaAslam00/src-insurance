<?php

use App\Http\Controllers\Backend as Backend;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend as Frontend;

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

require __DIR__ . '/auth.php';

// Backend Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Backend\DashboardController::class, 'index'])->name('dashboard');
    // Profile Routes
    Route::resource('profile', Backend\ProfileController::class);
    Route::put('change-password/{id}', [Backend\ProfileController::class, 'changePassword'])->name('change-password');

    // Clients Routes
    Route::resource('clients', Backend\ClientController::class);
    Route::get('clients-dt', [Backend\ClientController::class, 'dataTable'])->name('clients-datatable');
    Route::put('edit-client/{id}', [Backend\ClientController::class, 'client'])->name('edit-client');

    // Partners Routes
    Route::resource('partners', Backend\PartnerController::class);
    Route::get('partners-dt', [Backend\PartnerController::class, 'dataTable'])->name('partners-datatable');
    Route::put('edit-partner/{id}', [Backend\PartnerController::class, 'partner'])->name('edit-partner');

    // Policies Routes
    Route::get('policies-dt/{clientId}', [Backend\PolicyController::class, 'dataTable'])->name('policies-datatable');
    Route::resource('policies', Backend\PolicyController::class)->except('create');
    Route::get('policies/create/{clientId}', [Backend\PolicyController::class, 'create'])->name('policies.create');

    // Notices and Files Routes
    Route::prefix('/{policy}')->group(function () {
        // Notices and Files Routes
        Route::resource('notices-and-files', Backend\NoticeController::class);
        Route::get('notices-and-files-dt', [Backend\NoticeController::class, 'dataTable'])->name('notices-and-files-datatable');
    });
    // Payments Routes
    Route::prefix('/{policy}')->group(function () {
        Route::resource('payments', Backend\PaymentController::class);
        Route::get('payments-dt', [Backend\PaymentController::class, 'dataTable'])->name('payments-datatable');
    });

    // Users Routes
    Route::resource('users', Backend\UserController::class);
    Route::get('users-dt', [Backend\UserController::class, 'dataTable'])->name('users-datatable');
    // Roles Routes
    Route::resource('roles', Backend\RoleController::class);
    Route::get('roles-dt', [Backend\RoleController::class, 'dataTable'])->name('roles-datatable');

     // Quote Routes
    Route::get('quotes/{type?}', [Backend\QuoteController::class, 'index'])->name('quotes.index');
    Route::get('quotes/{id}/show', [Backend\QuoteController::class, 'show'])->name('quotes.show');
    Route::get('quotes/{quoteId}/client-forms', [Backend\QuoteController::class, 'acrobatForms'])->name('quotes.show.acrobat-forms');
    Route::get('quotes/{quoteId}/print-form/{formId}', [Backend\QuoteController::class, 'acrobatPrintForm'])->name('quotes.print.acrobat-form');
    Route::get('quotes/create/{id}', [Backend\QuoteController::class, 'create'])->name('quotes.create');
    Route::match(['get', 'post'], 'edit-quote/{id}', [Backend\QuoteController::class, 'editQuote'])->name('edit-quote');
    Route::get('quotes-dt/{type?}', [Backend\QuoteController::class, 'dataTable'])->name('quotes-dt');
    Route::delete('quotes/{id}', [Backend\QuoteController::class, 'destroy'])->name('quotes.destroy');
    Route::match(['get', 'post'], 'request-quote', [Backend\QuoteController::class, 'requestAQuoteByPartner'])->name('request-quote-by-partner');
    Route::match(['get', 'post'], 'quote/create-proposal/{quoteId}', [Backend\QuoteController::class, 'createProposal'])->name('create-proposal');
    Route::get('client/{clientId}/proposal/{proposalId}/download', [Backend\QuoteController::class, 'downloadProposal'])->name('download-proposal');
    Route::match(['get', 'post'], 'proposal/sign-proposal/{clientId}', [Backend\QuoteController::class, 'signProposal'])->name('sign-proposal');

    //  Request Cirtificate
    Route::match(['get', 'post'], '/request-certificate/{clientId}', [Backend\Certificate::class, 'certificate'])->name('request-certificate');

});

// Frontend Routes
Route::post('request-a-quote', [Backend\QuoteController::class, 'requestAQuote'])->name('request-a-quote');
Route::get('/', [Frontend\FrontendController::class, 'index'])->name('frontend.home');
Route::get('/services', [Frontend\FrontendController::class, 'services'])->name('frontend.services');
Route::get('/src-partners', [Frontend\FrontendController::class, 'srcPartners'])->name('frontend.src-partners');
Route::get('/client-login', [Frontend\FrontendController::class, 'clientLogin'])->name('frontend.client-login');
Route::get('/about-us', [Frontend\FrontendController::class, 'aboutUs'])->name('frontend.about-us');
Route::get('/payment-portal', [Frontend\FrontendController::class, 'paymentPortal'])->name('frontend.payment-portal');
Route::match(['get', 'post'], '/contact-us', [Frontend\FrontendController::class, 'contactUs'])->name('frontend.contact-us');
Route::get('/request-a-quote', [Frontend\FrontendController::class, 'requestAQuote'])->name('frontend.request-a-quote');

// Change Language
Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'es'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }
        return Redirect::back();
    })->name('setLocale');


// Clear Cache
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared successfully.';
});

// Create Storage Link
Route::get('/create-storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully.';
});