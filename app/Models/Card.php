<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'balance', 'user_id', 'tariff_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tariffs() {
        return $this->belongsTo(Tariffs::class);
    }

    public function cardHistory() {
        return $this->hasMany(CardHistory::class);
    }
    
    public function travelHistory() {
        return $this->hasMany(TravelHistory::class);
    }
}
