<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        if(!auth()->user()) {
            return redirect()->route('admin.login');
        } else {
            return redirect()->route('admin.dashboard');
        }
    });

    Route::get('/dashboard', function () {
        if(!auth()->check()) return redirect()->route('admin.login');
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
