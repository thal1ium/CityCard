<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $guard = 'admin';

    protected $fillable = ['login', 'email', 'password'];
    
    protected $hidden = ['password'];
}
