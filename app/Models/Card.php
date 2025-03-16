<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tariffs;
use App\Models\CardHistory;
use App\Models\TravelHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'balance', 'user_id', 'city_tariff_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cityTariff()
    {
        return $this->belongsTo(CityTariff::class);
    }

    public function cardHistory()
    {
        return $this->hasMany(CardHistory::class);
    }

    public function travelHistory()
    {
        return $this->hasMany(TravelHistory::class);
    }

    public static function getCards()
    {
        return Card::where("user_id", Auth::id())->get();
    }
}
