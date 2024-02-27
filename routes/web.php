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

// Route::get('/', function () {
//     return view('landing'); //landing is the main default users.login
// });

//show the landing page
Route::get('/', [UserController::class, 'show_landing_page']);

Route::get('/contact-us',[UserController::class,'showContactPage']);//show the contact us page

Route::post('/contact-us-submit',[UserCOntroller::class,'storeContactUs']);

//user codes
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');  //show login form
Route::get('/register', [UserController::class, 'register']); //show signup form
Route::post('/users', [UserController::class, 'store']);  //create new user/store to db
Route::post('/users/authenticate', [UserController::class, 'authenticate']); //Log In User
Route::post('/logout', [UserController::class, 'logout']);//logout the user logout
Route::post('/users/edit', [UserController::class, 'update_settings']);//update the user
Route::get('/users/change-password',[UserController::class, 'showChangePasswordPage']); //

//dynamic featured/job listing then if clicked, user will be redirected to job details page
Route::get('/job-details/{jobdetails}', [UserController::class, 'showJobListingDetails']);//navigate to job listing details
Route::post('/create-job-application', [UserController::class, 'createJobApplication']);// insert  data to job application database


//subscribe function
Route::post('/subscribe', [UserController::class, 'createSubscription']);


//create new company/inser to db
Route::post('/createcompany', [DashboardController::class, 'create_company']);
//create job posting/inser to db
Route::post('/createjoblisting', [DashboardController::class, 'create_jobposting']);
//create a resume then store to db
Route::post('/store-resume', [DashboardController::class, 'storeResume'])->name('storeResume');

//dashboard route but ge group
Route::group(
    [
        'as'        => 'dashboard', // Route group name
        'prefix'    => 'dashboard', // Prefix for all routes within the group
        'middleware' => 'auth',  // Middleware applied to all routes within the group
    ],
    function () {
        Route::get('home', [DashboardController::class, 'showDashboard'])->name('.home');

        Route::get('company', [DashboardController::class, 'showCompany'])->name('.company'); //show the company UI/list
        Route::get('company/create', [DashboardController::class, 'showCreateCompanyForm'])->name('.createCompany'); //show the create company form

        Route::get('job-listings', [DashboardController::class, 'showJobListing'])->name('.joblistings'); //show the job listing UI/page
        Route::get('/job-listings/job-post', [DashboardController::class, 'showCreateJobListingForm'])->name('.createJobListing'); //show the create job listing form
       
        Route::get('/job-listings/{listing_id}/applicants',[DashboardController::class,'showJobListingApplicantsPage']); //show the job listing applicants page
        
        Route::post('/job-listings/{listing_id}/applicant/{applicant_id}/update-status',[DashboardController::class,'updateApplicantStatus']); // update the applicants status

        Route::get('job-applications', [DashboardController::class, 'showJobApplication'])->name('.jobapplications');

        Route::get('settings', [DashboardController::class, 'showSettings'])->name('.settings'); //show the UI of profile settings

        Route::get('my-resume', [DashboardController::class, 'showResume'])->name('.resume'); //show the resume page/UI
        Route::get('create-resume', [DashboardController::class, 'showResumeForm'])->name('.showresumeform');
    }


);
 //older codes
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
