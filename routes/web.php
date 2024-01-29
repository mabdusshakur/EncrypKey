<?php

use App\Http\Controllers\Auth\VerifyEmail;
use App\Livewire\Auth\EmailVerificationPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegistrationPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\DashboardPage;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

route::group(['middleware' => ['prevent-auth']], function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegistrationPage::class)->name('register');
});


Route::group(['middleware' => ['auth', 'verified', 'banned']], function () {
    Route::get('/dashboard', DashboardPage::class)->name('dashboard');
});

Route::group(['middleware' => ['auth', 'prevent-verified']], function () {
    Route::get('/email-verification', EmailVerificationPage::class)->name('email-verification');
});

Route::get('/verify-email', function () {
    $token = request()->query('token');
    return app(VerifyEmail::class)->callAction('verify', ['token' => $token]);
})->name('verify-email')->middleware('prevent-verified');

Route::get('/forgot-password', ForgotPasswordPage::class)->name('forgot-password');
Route::get('/reset-password', ResetPasswordPage::class)->name('reset-password');

