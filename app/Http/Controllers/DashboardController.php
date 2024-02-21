<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //show the dashboard
    public function showDashboard(Request $request)
    {

        //if you pass middleware('auth') on route you can access user data in request
        $user = $request->user(); //this will return authenticated user data
        //then we can use the user's model to access its eloquent relationship
        //for example:
        $user_joblistings_count = $user->user_joblistings()->count(); //job listing

        //calculate the percentage
        $totalCount = JobListing::count(); // This queries the total count of job listings from the database
        $percentage = $totalCount > 0 ? ($user_joblistings_count / $totalCount) * 100 : 0; // Calculate the percentage if totalCount is greater than 0

        //job listing applications
        $user_job_listings = $user->user_joblistings();
        $user_job_listing_application_count = 0;
        //this will loop through each user's job listing and count all job listing applications.
        foreach ($user_job_listings as $user_job_listing) {
            $user_job_listing_application_count += $user_job_listing->job_listing_applications()->count();
        }

        //job application
        $user_job_applications_count = $user->user_applications()->count(); //find the user_applications method then count the applications in that user 

        //count the user companies
        $user_companies = $user->user_companies()->latest()->limit(5);
        //this will use the eloquent function on user model.
        return  view(
            'users.dashboard.home',
            [
                'listingCount' => $user_joblistings_count,
                'listingPercentage' => $percentage,
                'user_job_listing_application_count' => $user_job_listing_application_count,
                'user_job_applications_count' => $user_job_applications_count,
                'user_companies' => $user_companies
            ]
        );
    }

    //show the company page
    public function showCompany()
    {

        return  view('users.dashboard.company');
    }

    //show the job listings
    public function showJobListing()

    {
        return  view('users.dashboard.joblistings');
    }

    //show job applications
    public function showJobApplication()
    {
        return  view('users.dashboard.jobapplication');
    }


    // showSettings
    //show settings
    public function  showSettings(Request $request)
    {

        //if you pass middleware('auth') on route you can access user data in request
        $user = $request->user(); //this will return authenticated user data

        $userDetails = $user->user_detail()->first();
        // dd($userDetails);
        //this will use the eloquent function on user model.
        return  view('users.dashboard.settings',[
            'userDetails'=>$userDetails
        ]);
    }
   
}
