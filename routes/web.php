<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\Admin\CompanyController;
use App\Http\Controllers\Dashboard\Admin\HomeController;
use App\Http\Controllers\Dashboard\Auth\CompanyLoginController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Company\CompanyContactController;

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

Route::get('/', [ContactController::class, 'index'])->name('contact');
Route::get('/employees', [ContactController::class, 'employees'])->name('employees');
Route::get('/branches', [ContactController::class, 'branches'])->name('branches');
Route::get('/employer', [ContactController::class, 'employer'])->name('employer');
Route::get('/big-company/{id}', [ContactController::class, 'bigCompany']);
Route::post('/save-contact', [ContactController::class, 'saveContact'])->name('save.contact');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [LoginController::class, 'show'])->name('login');
        Route::post('/login/perform', [LoginController::class, 'login'])->name('login.perform');
    });
    Route::prefix('companies')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('companies');
        Route::get('/add', [CompanyController::class, 'add'])->name('companies.add');
        Route::post('/store', [CompanyController::class, 'store'])->name('companies.store');
    });
});


Route::prefix('company')->name('company.')->group(function () {
    Route::middleware('guest:company_user')->group(function () {
        Route::get('/login', [CompanyLoginController::class, 'show'])->name('login');
        Route::post('/login/perform', [CompanyLoginController::class, 'login'])->name('login.perform');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/', [CompanyContactController::class, 'index'])->name('contacts');
        Route::post('/update', [CompanyContactController::class, 'update'])->name('contacts.update');
    });
});

Route::prefix('dashboard')->middleware('auth:admin,company_user')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
});



