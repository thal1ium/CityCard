<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    // public function city() {
    //     return $this->belongsTo(City::class);
    // }

    public function cityTariff() {
        return $this->hasMany(CityTariff::class);
    }
    

    public static function getTariffs() {
        return Tariff::get();
    }
}
