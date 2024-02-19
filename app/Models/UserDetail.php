<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable=['user_id','first_name','last_name','age','gender','address','tel',];
    use HasFactory;

    //relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
}
