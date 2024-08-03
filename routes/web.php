<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\Dashboard\Admin\CompanyController;
use App\Http\Controllers\Dashboard\Admin\HomeController;
use App\Http\Controllers\Dashboard\Auth\CompanyLoginController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\CompanyUser\CompaniesController;
use App\Http\Controllers\Dashboard\CompanyUser\ContactController;
use App\Http\Controllers\Dashboard\CompanyUser\EmployeesController;
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

Route::get('/', [CardController::class, 'index'])->name('contact');
Route::get('/employees', [CardController::class, 'employees'])->name('employees');
Route::get('/branches', [CardController::class, 'branches'])->name('branches');
Route::get('/employer', [CardController::class, 'employer'])->name('employer');


Route::get('/big-company/{id}', [CardController::class, 'bigCompany']);
Route::get('/company/{id}', [CardController::class, 'company'])->name('company');
Route::get('/individual/{id}', [CardController::class, 'individual'])->name('individual');
Route::post('/save-contact', [CardController::class, 'saveContact'])->name('save.contact');
Route::get('/employees/{id}', [CardController::class, 'companyEmployees'])->name('employees.company');
Route::get('/branches/{id}', [CardController::class, 'companyBranches'])->name('branches.company');


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


Route::prefix('user')->name('company.')->group(function () {
    Route::middleware('guest:company_user')->group(function () {
        Route::get('/login', [CompanyLoginController::class, 'show'])->name('login');
        Route::post('/login/perform', [CompanyLoginController::class, 'login'])->name('login.perform');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts');
        Route::post('/update', [ContactController::class, 'update'])->name('contacts.update');
    });

    Route::prefix('companies')->group(function () {
        Route::get('/', [CompaniesController::class, 'index'])->name('companies');
        Route::get('/add', [CompaniesController::class, 'add'])->name('companies.add');
        Route::post('/store', [CompaniesController::class, 'store'])->name('companies.store');
        Route::get('/edit/{id}', [CompaniesController::class, 'edit'])->name('companies.edit');
        Route::post('/update', [CompaniesController::class, 'update'])->name('companies.contact.update');
        Route::post('/change/password', [CompaniesController::class, 'changePassword'])->name('companies.change.password');
        Route::get('/toggle/{id}/{status}', [CompaniesController::class, 'toggle'])->name('companies.toggle');
        Route::post('/destroy', [CompaniesController::class, 'destroy'])->name('companies.destroy');
    });

    Route::prefix('employees')->group(function () {
        Route::get('/', [EmployeesController::class, 'index'])->name('employees');
        Route::get('/add', [EmployeesController::class, 'add'])->name('employees.add');
        Route::post('/store', [EmployeesController::class, 'store'])->name('employees.store');
        Route::get('/edit/{id}', [EmployeesController::class, 'edit'])->name('employees.edit');
        Route::post('/update', [EmployeesController::class, 'update'])->name('employees.contact.update');
        Route::post('/change/password', [EmployeesController::class, 'changePassword'])->name('employees.change.password');
        Route::get('/toggle/{id}/{status}', [EmployeesController::class, 'toggle'])->name('employees.toggle');
        Route::post('/destroy', [EmployeesController::class, 'destroy'])->name('employees.destroy');
    });
});

Route::prefix('dashboard')->middleware('auth:admin,company_user')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
});



