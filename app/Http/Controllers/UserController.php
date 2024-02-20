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
      
  
    //login the user
    public function authenticate(Request $request){
        //validate
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/dashboard/home')->with('message', 'You are now logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //logout the user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

       // return redirect('/login')->with('message', 'You have been logged out');
       return redirect('/login');
    }
   
}

