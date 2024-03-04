<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobListing;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\ApplicantStatusNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DashboardController extends Controller
{
    //show the dashboard
    public function showDashboard(Request $request)
    {

        //if you pass middleware('auth') on route you can access user data in request
        $user = $request->user(); //this will return authenticated user data
        //then we can use the user's model to access its eloquent relationship
        //for example:
        $user_joblistings_count = $user->user_joblistings()->count(); //job listing count


        //job listing applications
        $user_job_listings = $user->user_joblistings()->latest()->get();

        $user_job_listing_application_count = 0;
        //this will loop through each user's job listing and count all job listing applications.
        foreach ($user_job_listings as $user_job_listing) {
            $user_job_listing_application_count += $user_job_listing->job_listings()->count();
        }

        //job application
        $user_job_applications_count = $user->user_applications()->count(); //find the user_applications method then count the applications in that user 

        //count the user companies
        $user_companies = $user->user_companies()->latest()->limit(5)->get();
        //this will use the eloquent function on user model.
        return  view(
            'users.dashboard.home',
            [
                'listingCount' => $user_joblistings_count,

                'user_job_listing_application_count' => $user_job_listing_application_count,
                'user_job_applications_count' => $user_job_applications_count,
                'user_companies' => $user_companies
            ]
        );
    }

    //show the company page
    public function showCompany(Request $request)
    {
        $user = $request->user();
        $user_companies = $user->user_companies()->withoutTrashed()->latest()->limit(5)->get(); // pangitaon si user_companies nga method ni user_companies.

        return  view('users.dashboard.company', [
            'user_companies' => $user_companies
        ]);
    }

    //show the job listings
    public function showJobListing(Request $request)
    {

        $user = $request->user();
        //old logic
        //  $user_joblisting = $user->user_joblistings()->latest()->limit(5)->get(); // pangitaon si user_companies nga method ni user_companies.
        // new logic, will not return job listing if company has soft deleted
        $user_joblisting = $user->user_joblistings()->whereHas('company')->latest()->get();
        return  view('users.dashboard.joblistings', ['user_joblisting' => $user_joblisting]);
    }

    //show the job listing applicants
    public function showJobListingApplicantsPage(Request $request)
    {
        /* Sir approach
        $joblisting = JobListing::find($request->listing_id);
        $joblisting_applicants = $joblisting->job_applications()->latest()->get();
         */
        $user = $request->user();
        $clickItem = $request->listing_id; //get the Job listing ID of clicked item

        $jobListings = $user->user_joblistings()->where('id', $clickItem)->get(); //find and get the job listing base on the click Item ID
        //  $jobApplications = $user->user_applications()->where('job_listing_id', $clickItem)->get(); //This adds a WHERE condition to the query, specifying that only job applications with a job_listing_id equal to $clickItem will be retrieved.
        $jobApplications = JobApplication::where('job_listing_id', $clickItem)->get();
        // $jobApplicationsTest=$user->user_applications()->get();
        // dd($jobApplicationsTest);
        // $jobListings= JobListing::find($clickItem);

        //$jobApplications= $jobListings->job_listings()->latest()->get();
        //.dd( $jobListings);
        return  view('users.dashboard.jobapplicants', [
            'jobListings' => $jobListings,
            'jobApplications' => $jobApplications
        ]);
    }
    //update the job applicants for that job listings
    public function updateApplicantStatus(Request $request)
    {
        $user = $request->user();

        $applicantId = $request->applicant_id; // the applicant_id is from the jobapplicant.blade, hidden input in the form
        $applicant = JobApplication::find($applicantId); //find a specific application base on the applicant ID

        //if applicant is found then update, e over ride ra ang status
        if ($applicant) {
            $applicant->status = $request->status; //override the status to the new status
            $applicant->save(); // save
            // $job_listing_applicant = $applicant->user;
            // dd($applicant->job_listing);
            $notification = new ApplicantStatusNotification($applicant->user->email, $request->status, $applicant->job_listing->job_title, $applicant->job_listing->company->name);
            $applicant->user->notify($notification);
            //redirect back with success message
            return Redirect::back()->with(['success' => 'Applicant status successfully updated']);
        } else {
            //redirect with error message
            return Redirect::back()->with(['error' => 'Applicant not found']);
        }
    }

    //show job applications
    public function showJobApplication(Request $request)
    {
        $user = $request->user();

        // $userJobApplications = $user->user_applications()->latest()->get(); //fetch the application of user
        //old logic


        // new logic, will not return job application if job listing's comapny is soft deleted
        $userJobApplications = $user->user_applications()->whereHas('job_listing.company')->latest()->get();
        return  view('users.dashboard.jobapplication', ['userJobApplications' => $userJobApplications]);
    }



    //show settings
    public function  showSettings(Request $request)
    {

        //if you pass middleware('auth') on route you can access user data in request
        $user = $request->user(); //this will return authenticated user data

        $userDetails = $user->user_detail()->first();
        // dd($userDetails);
        //this will use the eloquent function on user model.
        return  view('users.dashboard.settings', [
            'userDetails' => $userDetails
        ]);
    }

    //show the profile page
    public function showProfileImage(Request $request)
    {
        $user = $request->user(); //this will return authenticated user data

        $userDetails = $user->user_detail()->first();
        //.dd($userDetails);
        return view('users.dashboard.profilePage', ['userDetails' => $userDetails]);
    }

    //show the company form
    public function showCreateCompanyForm()
    {
        return view('users.dashboard.createcompany');
    }

    //create a company
    public function create_company(Request $request)
    {

        $user = $request->user();

        $formFields = $request->validate([
            'logo_url' => ['required'],
            'name' => ['required', Rule::unique('companies', 'name')],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'postal' => ['required'],
            'tel' => ['required'],
            'email' => ['required'],
            'website' => ['required'],
        ]);

        //This line checks if the incoming HTTP request has a file input named 'logo_url'. The hasFile method returns true if a file was uploaded via the specified input field.
        if ($request->hasFile('logo_url')) {
            /*  If a file with the name 'logo_url' is present in the request, e retrieve ang  file using the FILE Method then e store sa LOGOS folder in public folder*/

            //store locally
            // $formFields['logo_url'] = $request->file('logo_url')->store('logos', 'public');

            //store in 
            $formFields['logo_url'] = $request->file('logo_url')->storePublicly('public/images/company');
        }
        // dd($formField['logo_url']);

        // Company::create($formFields);
        $user->user_companies()->create($formFields);

        // return redirect('dashboard.home')->with('message', 'Listing created successfully');
        return redirect('/dashboard/company')->with('success', 'Company created successfully');
    }

    //show the create post form
    public function showCreateJobListingForm()
    {

        $companies = Company::all(); //retrieve all company record
        $categories = JobCategory::all(); //retrieve all job category record
        //check if user already created an company, if dili 0 thn maka show ra sa job listing create form
        if ($companies->count() != 0) {
            return view('users.dashboard.createjobposting', [
                'companies' => $companies,
                'categories' => $categories
            ]);
        } else {
            return redirect(route('dashboard.joblistings'))->with('error', 'Posting a job requires atleast one company');
        }
    }

    //soft delete a company
    public function companySoftDelete(Request $request)
    {
        $clickItem = $request->company_id;
        $company = Company::find($clickItem);


        try {
            $clickItem = $request->company_id;
            $company = Company::findOrFail($clickItem);

            $company->delete();
            return Redirect::back()->with('success', 'Company successfully moved to trash');
        } catch (ModelNotFoundException $e) {
            // return Redirect::back()->with('error', 'Company not found');
            return Redirect::back()->with('success', 'Company successfully moved to trash');
        }
    }
    //create a job posting 
    public function create_jobposting(Request $request)
    {
        $user = $request->user();

        $formFields = $request->validate([
            'company_id' => ['required'],
            'employment_type' => ['required'],
            'min_monthly_salary' => ['required'],
            'max_monthly_salary' => ['required'],
            'job_title' => ['required'],
            'job_category_id' => ['required'],
            'description' => ['required'],

        ]);
        $user->user_joblistings()->create($formFields);
        return redirect('/dashboard/job-listings')->with('success', 'Created job listing successfully.');
    }
    //show the resume page
    public function showResume(Request $request)
    {
        $user = $request->user();
        // $user_joblisting = $user->user_joblistings()->latest()->limit(5)->get(); // pangitaon si user_companies nga method ni user_companies.
        $user_resume = $user->user_resumes()->latest()->limit(5)->get();
        // dd( $user_resume->id());
        return view('users.dashboard.resume', ['user_resume' => $user_resume]);
    }

    //show the resume form
    public function showResumeForm()
    {
        return view('users.dashboard.createresume');
    }
    //create resume and save to database
    public function storeResume(Request $request)
    {
        $user = $request->user();

        $formFields = $request->validate([
            'name' => ['required'],
            'resume_url' => 'required|mimes:pdf,xlsx,xls,csv', //in order mo receive siya og stated URL
        ]);

        $formFields['resume_url'] = $request->file('resume_url')->store('resumes', 'public'); //to store sa local nga 'storage' na folder
        $user->user_resumes()->create($formFields);
        return redirect('/dashboard/my-resume')->with('success', 'Resume created successfully.');
    }
}
