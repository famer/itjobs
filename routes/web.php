<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ModerationController;
use App\Http\Controllers\Moderate\CompaniesController;
use App\Http\Controllers\Moderate\PositionsController;


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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LogoutController::class, 'logoutForm'])->name('logout');
Route::post('/logout', [LogoutController::class, 'logout']);

Route::get('/companies', [CompanyController::class, 'index'])->name('company');
Route::get('/companies/{company}', [CompanyController::class, 'company'])->whereNumber('company')->name('company.show');
Route::post('/companies', [CompanyController::class, 'store']);

Route::get('/position/{position}', [PositionController::class, 'index'])->whereNumber('position')->name('position');
Route::get('/position/{position}/edit', [PositionController::class, 'editForm'])->name('position.edit');
Route::patch('/position/{position}/edit', [PositionController::class, 'edit']);
Route::post('/position', [PositionController::class, 'store'])->name('position.post');
Route::delete('/position/{position}', [PositionController::class, 'destroy'])->name('position.destroy');

Route::get('/companies/moderate/', [CompaniesController::class, 'moderateCompaniesList'])->name('moderate.companies');
Route::patch('/companies/{company}/moderate', [CompaniesController::class, 'moderateCompany'])->name('moderate.company');
Route::get('/companies/{company}/moderate', [CompaniesController::class, 'moderateCompanyForm'])->name('moderate.company.form');

Route::get('/position/moderate/', [PositionsController::class, 'moderatePositionsList'])->name('moderate.positions');
Route::patch('/position/{position}/moderate', [PositionsController::class, 'moderatePosition'])->name('moderate.position');
Route::get('/position/{position}/moderate', [PositionsController::class, 'moderatePositionForm'])->name('moderate.position.form');
