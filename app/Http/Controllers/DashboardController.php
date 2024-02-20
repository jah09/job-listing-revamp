<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
     //show the dashboard
     public function showdashboard(){
        return  view('users.dashboard.home');
    }

    //show the company page
    public function showcompany(){
        return  view('users.dashboard.company');
    }
}
