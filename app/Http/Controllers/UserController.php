<?php

namespace App\Http\Controllers;



use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact;
use App\Models\JobListing;
use App\Models\Newsletter;
use App\Models\UserDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Log as log;
use App\Notifications\JobListingApplicationNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class UserController extends Controller
{
    //return the view of login-form
    public function login()
    {
        return  view('auth.login');
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
        return  view('auth.register');
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
    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    // for sendling password reset link
    public function forgot_password_send_email(Request $request)
    {

        //This line validates the incoming request data. It ensures that the request contains an email parameter, and that the value of the email parameter is a valid email address.
        $request->validate(['email' => 'required|email']);


        //This line sends a password reset link to the provided email address. It uses Laravel's built-in Password class which provides methods for handling password resets. The sendResetLink method takes an array containing only the email address from the request.
        $status = Password::sendResetLink($request->only('email'));

        //checks the return status of the sendResetLink method. 
        if ($status == Password::RESET_LINK_SENT) {
            return Redirect::back()->with(['success' => 'Password reset link has been sent to email.']);
        } else {
            return Redirect::back()->with(['error' => 'Failed to sent password reset link']);
        }
    }
    //reset-password
    public function reset_password(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    }
    //Handling the saving new password
    public function save_reset_password(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);
        //This code is a closure function that takes a $user object as input. It's used within the Password::reset method call for updating the user's password and generating a new remember token.
        $status = Password::reset(
            $request->only('email', 'password', 'token'),
            function ($user) use ($request) {
                //This method allows you to fill the model with a given array of attributes, bypassing mass assignment protection. In this case, it's updating the user's password with the hashed value of the new password provided in the request. Hash::make($request->password) hashes the new password for security.
                $user->forceFill([
                    'password' => Hash::make($request->password)

                ])->setRememberToken(Str::random(60)); //This method generates a new remember token for the user. Remember tokens are used for authentication and are typically stored in a cookie. Str::random(60) generates a random string of 60 characters.
                $user->save(); //saves the changes made by the user
                event(new PasswordReset($user)); //This line triggers the PasswordReset event, which can be used for logging, notifications, or other actions related to password resets.
            }
        );
        if ($status == Password::PASSWORD_RESET) {
            return Redirect::back()->with(['success' => 'Password has been sucessfully changed']);
        } else {
            return Redirect::back()->with(['success' => 'Failed to change password']);
        }
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
            'profile_logo'
        ]);
        // $formFields['logo_url'] = $request->file('logo_url')->storePublicly('public/images/company');
        if ($request->hasFile('profile_logo')) {
            /*  If a file with the name 'logo_url' is present in the request, e retrieve ang  file using the FILE Method then e store sa LOGOS folder in public folder*/
            //  $formFields['profile_logo'] = $request->file('profile_logo')->store('profile_image', 'public');
            $formFields['profile_logo'] = $request->file('profile_logo')->storePublicly('public/images/profile');
        }
        // $user->user_detail()->updateOrCreate(
        //     ['user_id' => $user->id], // Search criteria
        //     $formFields // Values to update or create
        // );
        if ($user) {
            // Retrieve the user details associated with the user
            $userDetails = $user->user_detail()->exists();
            if ($userDetails) {
                // $user->user_detail()->update(
                //     ['user_id' => $user->id], // Search criteria
                //     $formFields // Values to update or create
                // );
                $user->user_detail()->update($formFields);
                return redirect(route('dashboard.profile_page'))->with('success', 'Profile updated successfully.');
            }else{
                 $user->user_detail()->create($formFields);
                 return redirect(route('dashboard.profile_page'))->with('success', 'Profile created successfully.');
            }
        }
    }


    //show the landing page
    public function show_landing_page()
    {
        //old logic 
        //  $user_joblisting = JobListing::all(); //fetch the job listing data from database then pass to landing page by jobListing variable
        // new logic, will not return job listing if company has soft deleted
        $user_joblisting = JobListing::whereHas('company')->filter(request(['search']))->get();

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
            return view('auth.verify-email');
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
            return view('auth.verify-email');
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
