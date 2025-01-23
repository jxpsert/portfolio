<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/projects/{project}', [PageController::class, 'project'])->name('projects.show');
Route::get('/links', [PageController::class, 'links'])->name('links');