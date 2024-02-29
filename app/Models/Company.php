<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory,SoftDeletes; //use must be on top
    protected $fillable=['user_id','name','logo_url','address','city','state','postal','tel','email','website'];
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function job_listings(){
        return $this->hasMany(JobListing::class);
    }
    public function image_url()
    {
        // Check if logo_url is set
        if ($this->logo_url) {
            //  return Storage::disk('s3')->url($this->logo_url);
            return env('AWS_URL').$this->logo_url;
        }
        return null;
    
     
    }

}
