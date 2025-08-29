<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Backend as Backend;
use App\Http\Controllers\Backend\DocumentController;
use App\Http\Controllers\Backend\UserHourController;

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
    Route::get('/dashboard-dt', [Backend\DashboardController::class, 'dataTable'])->name('latest-leaves-datatable');

    // Profile Routes
    Route::resource('profile', Backend\ProfileController::class);
    Route::put('change-password/{id}', [Backend\ProfileController::class, 'changePassword'])->name('change-password');

    // Users Routes
    Route::resource('users', Backend\UserController::class);
    Route::get('users-dt', [Backend\UserController::class, 'dataTable'])->name('users-datatable');

    // User Documents Route
    Route::resource('user.documents', DocumentController::class);
    Route::get('user-documents-dt/{user}', [Backend\DocumentController::class, 'dataTable'])->name('user-documents-datatable');

    // Roles Routes
    Route::resource('roles', Backend\RoleController::class);
    Route::get('roles-dt', [Backend\RoleController::class, 'dataTable'])->name('roles-datatable');

    // Leaves Routes
    Route::resource('leaves', Backend\LeaveController::class)->except('index');
    Route::get('leave/{status}', [Backend\LeaveController::class, 'index'])->name('leaves.index');
    Route::get('leaves-dt/{status}', [Backend\LeaveController::class, 'dataTable'])->name('leaves-datatable');

    Route::post('/leaves/update-status', [Backend\LeaveController::class, 'updateStatus'])->name('leaves.updateStatus');

    // Sick Leave request Route
    Route::resource('sick-leave', Backend\SickLeaveController::class);
    Route::post('request-sl', [Backend\SickLeaveController::class, 'requestSickLeave'])->name('request-sick-leave');
    Route::get('sick-dt', [Backend\SickLeaveController::class, 'dataTable'])->name('sick-datatable');
    Route::post('/sick/update-status', [Backend\SickLeaveController::class, 'updateStatus'])->name('sick.updateStatus');

    // call in better
    Route::get('call-in-better', [Backend\LeaveController::class, 'callInBetter'])->name('call-in-better');
    // locations Routes
    Route::resource('locations', Backend\LocationController::class);
    Route::get('location-dt', [Backend\LocationController::class, 'dataTable'])->name('locations-datatable');

     // Working hours
    Route::resource('working', Backend\WorkingHoursController::class);
    Route::get('working-dt', [Backend\WorkingHoursController::class, 'dataTable'])->name('working-datatable');

     //Projects
    Route::resource('projects', Backend\ProjectController::class);
    Route::get('project-dt', [Backend\ProjectController::class, 'dataTable'])->name('project-datatable');

    Route::get('project-dt', [Backend\ProjectController::class, 'dataTable'])->name('project-datatable');


    //Holiday agenda
    Route::resource('holiday-agenda', Backend\HolidayAgendaController::class);
    Route::get('holiday-agenda-dt', [Backend\HolidayAgendaController::class, 'dataTable'])->name('holiday-datatable');

    /// personal files
    Route::resource('personal-files', Backend\PersonalFileController::class);
    Route::get('personal-file-dt', [Backend\PersonalFileController::class, 'dataTable'])->name('personal-file-datatable');


    // admin user hours

    Route::resource('user.hours', UserHourController::class);
    Route::get('user-hours-dt/{user}', [Backend\UserHourController::class, 'dataTable'])->name('user-hours-datatable');
    Route::get('user-kilometer-dt/{user}', [Backend\UserHourController::class, 'kilometerDataTable'])->name('user-kilometer-datatable');


    //register
    Route::resource('register', Backend\RegisterController::class);
    Route::get('fetch-records', [Backend\RegisterController::class, 'fetchRecords'])->name('fetch.records');
    Route::get('/register/create/{date}', [Backend\RegisterController::class, 'create'])->name('create.register');

    Route::post('request-request-hour', [Backend\RegisterController::class, 'requestSubmitHour'])->name('request-submit-hour');
    /// fetch holidays and leave dates

    Route::get('/fetch-dates', [Backend\RegisterController::class, 'fetchDates'])->name('fetch.dates');

    Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'nl'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }
        return Redirect::back();
    })->name('setLocale');


});

// Frontend Routes
Route::redirect('/', '/login');

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared successfully.';
});
