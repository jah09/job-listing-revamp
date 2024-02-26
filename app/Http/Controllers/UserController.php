<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\JobListing;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //return the view of login-form
    public function login()
    {
        return  view('users.login');
    }


    //return the register form
    public function register()
    {
        return  view('users.register');
    }

    //store the user data to database or register
    public function store(Request $request)
    {
        //validate
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        /*It uses Laravel's authentication system, which provides a global helper function auth() to access authentication services.
        The login method is called on the authentication service, and it takes the user object as an argument. 
        */
        auth()->login($user);

        // return redirect('/login')->with('message', 'Account successfully created.');
        return redirect('/login');
    }


    //login the user
    public function authenticate(Request $request)
    {
        //validate
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();

            ///dashboard/home
            return redirect('/dashboard/home')->with('message', 'You are now logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //logout the user
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect('/login')->with('message', 'You have been logged out');
        return redirect('/')->with('error', 'Logout successfully');
    }
    //update the user settings
    public function update_settings(Request $request)
    {

        //if you pass middleware('auth') on route you can access user data in request
        $user = $request->user(); //this will return authenticated user data

        $formFields = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'age' => ['required',],
            'gender' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'tel' => ['required', 'min:3'],
        ]);

        $user->user_detail()->updateOrCreate(
            ['user_id' => $user->id], // Search criteria
            $formFields // Values to update or create
        );
        return redirect(route('dashboard.settings'));
    }

    //show the landing page
    public function show_landing_page()
    {
        $user_joblisting = JobListing::all(); //fetch the job listing data from database then pass to landing page by jobListing variable
        return view(
            'landing',
            ['jobListing' => $user_joblisting]

        );
    }

    //show the job listing details page
    public function showJobListingDetails(Request $request)
    {
        // $user = $request->user();
        // $user_resume = $user->user_resumes()->get();
        // dd($user_resume->count());
        // Check if a user is authenticated
        if ($request->user()) {
            // If authenticated, proceed with fetching user details and resumes
            $user = $request->user();
            $user_resume = $user->user_resumes()->get();
        } else {
            // If not authenticated, set $user_resume to an empty collection or handle it according to your application logic
            $user_resume = collect();
        }

        // Fetch the job listing details
        $listing = JobListing::find($request->jobdetails);

        //  dd( auth()->user()->id != $listing->user_id);
        $educationType = ['none', 'elem', 'jhs', 'shs', 'bachelor', 'masters', 'doctorate'];
        // Pass the job listing details and user resumes to the view
        return view('components.joblistingdetails', ['listing' => $listing, 'user_resume' => $user_resume, 'educationType' => $educationType]);
    }

    //insert to job application table
    public function createJobApplication(Request $request)
    {
        $user = $request->user();

        $formFields = $request->validate([
            'job_listing_id' => ['required'],
            'resume_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'tel' => ['required'],
            'education' => ['required']
        ]);

        // $job_application = $user->user_applications()->firstOrNew($formFields);

        // if (!$job_application->exists()) {
        //     $job_application->save();
        //     return redirect('/dashboard/home')->with('success' , 'Application form submitted');

        // } else {

        //     return redirect('/dashboard/my-resume')->with('error' ,'You already submitted an application form on this company');
        // }
        $job_application = $user->user_applications()
            ->where('job_listing_id', $formFields['job_listing_id'])
            ->first();

        if (!$job_application) {
            $job_application = new JobApplication($formFields);
            $user->user_applications()->save($job_application);
            return redirect('/dashboard/home')->with('success', 'Application form submitted');
        } else {
            return redirect('/dashboard/my-resume')->with('error', 'You already submitted an application form for this job listing');
        }

        //return redirect('/dashboard/home')->with('success', 'Apply successfully.');
    }
}
