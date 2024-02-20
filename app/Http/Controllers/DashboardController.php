<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     //show the dashboard
     public function showDashboard(){
        return  view('users.dashboard.home');
    }

    //show the company page
    public function showCompany(){
        return  view('users.dashboard.company');
    }

    //show the job listings
    public function showJobListing(){
        return  view('users.dashboard.joblistings');
    }

    //show job applications
    public function showJobApplication(){
         return  view('users.dashboard.jobapplication');
    }


   // showSettings
     //show settings
     public function  showSettings(){
        return  view('users.dashboard.settings');
   }


}
