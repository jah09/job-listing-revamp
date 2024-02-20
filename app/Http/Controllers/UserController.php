<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //return the view of login-form

    public function login(){
        return  view('users.login');
    }
      
    
    //return the register form
    public function register(){
        return  view('users.register');
    }
      
    //show the dashboard
    public function showdashboard(){
        return  view('users.home');
    }

   
}
