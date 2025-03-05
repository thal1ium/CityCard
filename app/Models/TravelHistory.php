<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelHistory extends Model
{
    use HasFactory;

    protected $fillable = ['time', 'card_id'];

    public function card() {
        return $this->belongsTo(Card::class);
    }
}
