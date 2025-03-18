<?php

namespace App\Http\Controllers;

use App\Models\CityTariff;
use Illuminate\Http\Request;

class CityTariffController extends Controller
{


    public function getTariffsByCity(int $cityId) {
        return CityTariff::getCityTariffs($cityId);
    }
}
