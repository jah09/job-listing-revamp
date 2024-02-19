<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResume extends Model
{
    protected $fillable=['user_id','resume_url'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
