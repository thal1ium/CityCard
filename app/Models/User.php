<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = ['phone', 'password', 'balance'];

    public function cards(): HasMany 
    {
        return $this->hasMany(Card::class);
    }
    
    public function userTransaction(): HasMany 
    {
        return $this->hasMany(UserTransaction::class);
    }

    public static function getBalance(): int
    {
        return Auth::user()->balance | 0;
    }
}
