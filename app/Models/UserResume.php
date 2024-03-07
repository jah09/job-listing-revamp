<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserResume extends Model
{
    protected $fillable=['user_id','resume_url','name'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function user_job_application(){
        return $this->hasMany(JobApplication::class ,'resume_id');
    }
    public function private_resume_url()
{
    // Check if resume_url exists
    if ($this->resume_url) {
        return Storage::disk('s3')->temporaryUrl($this->resume_url, now()->addMinutes(5));
    }

    return null;
}
}
