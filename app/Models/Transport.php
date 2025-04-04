<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function cityTariff() {
        return $this->hasMany(CityTariff::class);
    }
    
    public static function getTransports() {
        return Transport::get();
    }
}
