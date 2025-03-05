<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariffs extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'city_id'];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function transportTariffs() {
        return $this->hasMany(TransportTariff::class);
    }
}
