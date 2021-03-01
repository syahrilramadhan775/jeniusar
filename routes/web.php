<?php

use App\Actions\Fortify\PasswordResetLinkController;
use App\Http\Controllers\Fortify\LoginController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware(['static.authenticate'])->group(function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('license', 'VerficationCodeCRUD');
    Route::resource('client', 'UsersCRUD');
});

// Overwrite Laravel Forify Authenticate
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::post('login', [LoginController::class, 'authenticate']);
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('register', [LoginController::class, 'register']);
