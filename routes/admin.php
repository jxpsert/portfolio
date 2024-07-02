<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Middleware\IsLoggedIn;

Route::group(['middleware' => ['web', IsLoggedIn::class]], function () {
    Route::get('/', function () {
        if(!auth()->user()) {
            return redirect()->route('admin.login');
        } else {
            return redirect()->route('admin.dashboard');
        }
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/login', [LoginController::class, 'loginPage'])->name('login')->withoutMiddleware([IsLoggedIn::class]);
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt')->withoutMiddleware([IsLoggedIn::class]);

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('experiences', ExperienceController::class)->except('show');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('projects', ProjectController::class)->except('show');
    Route::resource('companies', CompanyController::class)->except('show');
    Route::resource('settings', SettingController::class)->except('show');
});
