<?php

namespace App\Models;

use App\Traits\bcryptPass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory , bcryptPass;
    protected $fillable=['name','email','password'];
}
