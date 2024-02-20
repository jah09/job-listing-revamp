<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('landing');
});

//show login form
Route::get('/login', [UserController::class, 'login']);


//show signup form
Route::get('/register', [UserController::class, 'register']);

//dashboard
//show navbar
Route::get('/dashboard/home', [DashboardController::class, 'showdashboard'])->name('dashboard.home'); //name('dashboard.home') purpose

//show the company page
Route::get('/dashboard/company', [DashboardController::class, 'showcompany'])->name('dashboard.company');
