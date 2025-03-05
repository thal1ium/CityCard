<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportTariff extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'tariff_id', 'transport_id'];

    public function tariff() {
        return $this->belongsTo(Tariffs::class);
    }
    public function transport() {
        return $this->belongsTo(Transport::class);
    }
}
