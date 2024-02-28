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
}
