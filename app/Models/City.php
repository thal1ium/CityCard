<?php

namespace App\Models;

use Illuminate\Container\Attributes\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cityTariff() {
        return $this->hasMany(CityTariff::class);
    }    

    public static function getCities() {
        return City::get();
    }
}
