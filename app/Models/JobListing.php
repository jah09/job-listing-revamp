<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = ['company_id', 'user_id', 'job_category_id', 'min_monthly_salary', 'max_monthly_salary', 'description', 'employment_type', 'job_title'];
    use HasFactory;
    public function scopeFilter($query, array $filters)
    {
    
        if ($filters['search'] ?? false) {
            $searchTerm = request('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('job_title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    // public function job_listing()
    // {
    //     return $this->belongsTo(Company::class);
    // }

    public function user_jobListing()
    {

        return $this->belongsTo(User::class);
    }

    public function job_listings()
    {
        return $this->hasMany(JobApplication::class);
    }
}
