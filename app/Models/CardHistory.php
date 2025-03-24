<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardHistory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['amount', 'transaction_type', 'time', 'card_id'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
