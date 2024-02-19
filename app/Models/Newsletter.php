<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable=['email','subscribe_date','unsubscribe_date','active'];
    use HasFactory;
}
