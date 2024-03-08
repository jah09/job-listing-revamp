<?php

namespace App\Models;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplication extends Model
{
    protected $fillable=['job_listing_id','user_id','resume_id','first_name','last_name','tel','education'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function job_listing(){
        return $this->belongsTo(JobListing::class);
    }

    public function user_resume(){
        return $this->belongsTo(UserResume::class, 'resume_id');
    }

    // public function belongTo_JobApplication(){
    //     return $this->belongsTo(JobApplication::class);
    // }
    public function notifications(){
         return $this->hasMany(Notification::class, 'application_id');
    }

    public function scopeFilter($query, array $filters){
        if($filters['application_id']??false){
            $query->where('id',request('application_id'));
        }
    }   
}
