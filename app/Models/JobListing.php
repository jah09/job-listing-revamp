<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = ['company_id', 'user_id', 'job_category_id', 'min_monthly_salary', 'max_monthly_salary', 'description', 'employment_type'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function job_category(){
        return $this->belongsTo(JobCategory::class);

    }

    public function job_listing()
    {
        return $this->belongsTo(Company::class);
    }

    public function user_jobListing()
    {

        return $this->belongsTo(User::class);
    }

    public function job_listings(){
        return $this->hasMany(JobApplication::class);
    }
}
