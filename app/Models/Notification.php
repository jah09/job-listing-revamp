<?php

namespace App\Models;

use App\Models\JobApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;
    protected $fillable=['user_id','message','read','application_id'];
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function job_application(){
         return $this->belongsTo(JobApplication::class,'application_id');
    }
    
}
