<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTariff extends Model
{
    /** @use HasFactory<\Database\Factories\CityTariffFactory> */
    use HasFactory;

    protected $fillable = ['price', 'tariff_id', 'city_id', 'transport_id'];

    public function card() {
        return $this->hasMany(Card::class);
    }

    public function tariff() {
        return $this->belongsTo(Tariff::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function transport() {
        return $this->belongsTo(Transport::class);
    }

    public static function getCityTariffs($cityId) {
        return CityTariff::with(['tariff', 'city', 'transport'])->where('city_id', $cityId)->get();
    }
}
