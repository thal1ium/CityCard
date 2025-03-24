<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityTariff;
use App\Models\Tariff;
use App\Models\Transport;
use Illuminate\Http\Request;

class CityTariffController extends Controller
{
    public function index()
    {
        $cityTariff = CityTariff::all();

        return view('admin.citytariffs.index', ['cityTariffs' => $cityTariff]);
    }

    public function create()
    {
        return view('admin.citytariffs.create', ['cities' => City::all(), 'transports' => Transport::all(), 'tariffs' => Tariff::all()]);
    }

    public function store(Request $request) {
        $request->validate([
            'city_id' => 'required|string|max:255',
            'transport_id' => 'required|string|max:255',
            'tariff_id' => 'required|string|max:255',
            'price' => 'required|min:0|max:500',
        ]);

        CityTariff::create($request->only('price', 'tariff_id', 'city_id', 'transport_id'));

        return redirect()->route('admin.city-tariffs.index');
    }

    public function update(Request $request, $id) {
        $cityTariff = CityTariff::find($id);
        $cityTariff->price = $request->input('price');
        $cityTariff->save();

        return redirect()->route('admin.city-tariffs.index');
    }
    
    public function destroy(Request $request, $id) {
        CityTariff::where('id', $id)->delete();
        
        return redirect()->route('admin.city-tariffs.index');
    }

    public function getTariffsByCity(int $cityId)
    {
        return CityTariff::getCityTariffs($cityId);
    }
}
