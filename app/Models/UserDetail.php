<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable=['user_id','first_name','last_name','age','gender','address','tel','profile_logo'];
 

    //relationship
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function image_url()
    {
        // Check if logo_url is set
        if ($this->profile_logo) {
            //  return Storage::disk('s3')->url($this->logo_url);
            return env('AWS_URL').$this->profile_logo;
        }
        return null;
    
     
    }

}
