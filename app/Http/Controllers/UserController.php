<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

    //store the data to database
    public function store(Request $request){
        //validate
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        auth()->login($user);

      // return redirect('/login')->with('message', 'Account successfully created.');
      return redirect('/login');
    }
      
  
   
}
