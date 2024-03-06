<?php

namespace App\Http\Controllers;



use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use App\Models\JobListing;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log as log;
use App\Notifications\JobListingApplicationNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class UserController extends Controller
{
    //return the view of login-form
    public function login()
    {
        return  view('users.login');
    }

    //show the contact page screen
    public  function showContactPage()
    {
        return view('contacts');
    }

    //show the about page
    public function showAboutPage()
    {
        return view('about');
    }
    //insert to contact db
    public function storeContactUs(Request $request)
    {

        $formFields = $request->validate([
            'email' => ['email', 'required'],
            'subject' => ['required'],
            'message' => ['required']
        ]);
        //  $formFields['subscribe_date'] = Carbon::now();
        Contact::create($formFields);

        return redirect('/')->with('success', 'Contact Successfully');
    }

    //return the view register form
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
        event(new Registered($user)); //it will make class User extends Authenticatable   implements MustVerifyEmail triggered
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
            return redirect('/dashboard/home')->with('success', 'You are now logged in');
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
        return redirect('/')->with('success', 'Logout successfully');
    }

    //show the forgot password page
    public function showChangePasswordPage()
    {
        return view('users.forgotpassword');
    }

    //change password 
    public function updatePassword(Request $request)
    {
        // $user = $request->user();
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:6'
        ]);
        $user = User::where('email', $formfields['email'])->first();
        if ($user) {
               $formFields['password'] = bcrypt($formfields['password']);
           // $user->password = bcrypt::make($formfields['password']);
           // $user->save();
           $user->update($formFields); // Update the user with hashed password
    
            return redirect()->back()->with('success', 'Password updated successfully.');
        } else {
            return redirect()->back()->with('error', 'User with provided email not found.');
        }
       // return redirect::back()->with('success', 'Password updated successfully.');
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
            'profile_logo' => ['required']
        ]);
        // $formFields['logo_url'] = $request->file('logo_url')->storePublicly('public/images/company');
        if ($request->hasFile('profile_logo')) {
            /*  If a file with the name 'logo_url' is present in the request, e retrieve ang  file using the FILE Method then e store sa LOGOS folder in public folder*/
            //  $formFields['profile_logo'] = $request->file('profile_logo')->store('profile_image', 'public');
            $formFields['profile_logo'] = $request->file('profile_logo')->storePublicly('public/images/profile');
        }
        $user->user_detail()->updateOrCreate(
            ['user_id' => $user->id], // Search criteria
            $formFields // Values to update or create
        );
        return redirect(route('dashboard.settings'))->with('success', 'Profile updated successfully.');
    }


    //show the landing page
    public function show_landing_page()
    {
        //old logic 
        //  $user_joblisting = JobListing::all(); //fetch the job listing data from database then pass to landing page by jobListing variable
        // new logic, will not return job listing if company has soft deleted
        $user_joblisting = JobListing::whereHas('company')->get();

        return view(
            'landing',
            ['jobListing' => $user_joblisting]

        );
    }

    //show the job listing details page
    public function showJobListingDetails(Request $request)
    {

        // Check if a user is authenticated
        if ($request->user()) {
            // If authenticated, proceed with fetching user details and resumes
            $user = $request->user();
            $user_resume = $user->user_resumes()->get();
        } else {
            // If not authenticated, set $user_resume to an empty collection
            $user_resume = collect();
        }

        // Fetch the job listing details
        $listing = JobListing::find($request->jobdetails); // pass the parameters or the item clicked by user

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


        $existing_job_application = $user->user_applications()
            ->where('job_listing_id', $formFields['job_listing_id'])
            ->first();

        if (!$existing_job_application) {
            // $existing_job_application = new JobApplication($formFields);
            //  $user->user_applications()->save($existing_job_application);
            $job_application = $user->user_applications()->create($formFields);

            $job_listing_owner = $job_application->job_listing->user;

            //pass the params to notification
            $notification = new JobListingApplicationNotification($user->email, $job_application->job_listing);
            $job_listing_owner->notify($notification);
            return redirect('/dashboard/home')->with('success', 'Application form submitted');
        } else {
            return redirect('/dashboard/my-resume')->with('error', 'You already submitted an application form for this job listing');
        }
    }

    //create subscribe or click the subscribe button in footer
    public function createSubscription(Request $request)
    {
        $user = $request->user();
        $formFields = $request->validate([
            'email' => ['email', 'required']
        ]);
        $formFields['subscribe_date'] = Carbon::now();
        Newsletter::create($formFields);
        return redirect('/')->with('success', 'Subscribe Successfully');
    }


    public function verify_notice(Request $request)
    {
        $user = $request->user();
        //check if user is alredy verified,
        if ($user->hasVerifiedEmail()) {
            // if true 
            return redirect('/dashboard/home')->with('success', 'You are already verified');
        } else {
            return view('users.verification.verify-email');
        }
    }

    //for posting resend verification email
    public function send_verification_email(Request $request)
    {
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            return redirect('/dashboard/home')->with('success', 'Users verified successfully');
        } else {
            $user->sendEmailVerificationNotification();
            return view('users.verification.verify-email');
        }
    }
    //for processing email verification 
    public function verify_email(EmailVerificationRequest $request)
    {
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            return redirect('/dashboard/home')->with('success', 'Users verified successfully');
        }
        if ($user->markEmailAsVerified()) {
            //return view('users.verification.verify-email');
            //call the event Verified to finish the user verification
            event(new Verified($request->user()));
            return redirect('/dashboard/home')->with('success', 'Users verified successfully');
        }
    }
}
