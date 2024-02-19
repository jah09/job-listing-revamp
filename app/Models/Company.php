<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=['user_id','name','logo_url','address','city','state','postal','tel','email','website','deleted_at'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
