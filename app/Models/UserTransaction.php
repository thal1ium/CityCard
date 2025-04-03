<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    protected $fillable = ['sum', 'operation', 'time', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
