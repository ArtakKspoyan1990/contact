<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\LoginController;
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

Route::get('/', [ContactController::class, 'index'])->name('contact');
Route::get('/employees', [ContactController::class, 'employees'])->name('employees');
Route::get('/branches', [ContactController::class, 'branches'])->name('branches');
Route::get('/employer', [ContactController::class, 'employer'])->name('employer');
Route::get('/big-company/{id}', [ContactController::class, 'bigCompany']);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login/perform', [LoginController::class, 'login'])->name('login.perform');

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
