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
    return view('users.login'); //landing is the main default
});

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//show signup form
Route::get('/register', [UserController::class, 'register']);

//dashboard routes but it ge tagsa2

// Route::get('/dashboard/home', [DashboardController::class, 'showDashboard'])->name('dashboard.home')->middleware('auth'); 

//show the company page
// Route::get('/dashboard/company', [DashboardController::class, 'showCompany'])->name('dashboard.company');

//show the job listing
// Route::get('/dashboard/job-listings', [DashboardController::class, 'showJobListing'])->name('dashboard.joblistings');


//show the job application
// Route::get('/dashboard/job-applications', [DashboardController::class, 'showJobApplication'])->name('dashboard.jobapplications');

//show the settings
// Route::get('/dashboard/settings', [DashboardController::class, 'showSettings'])->name('dashboard.settings');

//create new user
Route::post('/users', [UserController::class, 'store']);

//Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//logout the user logout
Route::post('/logout',[UserController::class, 'logout']);

//update the user
Route::post('/users/edit',[UserController::class,'update_settings']);

//create new company
Route::post('/createcompany',[DashboardController::class,'create_company']);


//dashboard route but ge group
Route::group([
    'as'        => 'dashboard', // Route group name
    'prefix'    => 'dashboard', // Prefix for all routes within the group
    'middleware' => 'auth',  // Middleware applied to all routes within the group
],function(){ 
    Route::get('home', [DashboardController::class, 'showDashboard'])->name('.home');
    Route::get('company', [DashboardController::class, 'showCompany'])->name('.company');
    Route::get('job-listings', [DashboardController::class, 'showJobListing'])->name('.joblistings');
    Route::get('job-applications', [DashboardController::class, 'showJobApplication'])->name('.jobapplications');
    Route::get('settings', [DashboardController::class, 'showSettings'])->name('.settings');
    Route::get('company/create',[DashboardController::class,'showCreateCompanyForm'])->name('.createCompany'); 
    Route::get('/job-listings/job-post',[DashboardController::class,'showCreateJobListingForm'])->name('.createJobListing');

}


);