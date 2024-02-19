<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //relationship
    public function user_detail(){
        return $this->hasOne(UserDetail::class);
        
    }

    public function user_resumes(){
        return $this->hasMany(UserResume::class);
    }

    public function user_companies(){
        return $this->hasMany(Company::class);
    }

    public function user_joblistings(){
       
            return $this->hasMany(JobListing::class);
       
    }
}
