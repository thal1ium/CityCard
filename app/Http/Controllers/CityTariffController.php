<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityTariffStoreRequest;
use App\Models\City;
use App\Models\CityTariff;
use App\Models\Tariff;
use App\Models\Transport;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityTariffController extends Controller
{
    public function index(): View
    {
        $cityTariff = CityTariff::all();

        return view('admin.citytariffs.index', ['cityTariffs' => $cityTariff]);
    }

    public function create(): View
    {
        return view('admin.citytariffs.create', ['cities' => City::all(), 'transports' => Transport::all(), 'tariffs' => Tariff::all()]);
    }

    public function store(CityTariffStoreRequest $request): RedirectResponse 
    {
        $request->validated();

        CityTariff::create($request->only('price', 'tariff_id', 'city_id', 'transport_id'));

        return redirect()->route('admin.city-tariffs.index');
    }

    public function update(Request $request, string $id): RedirectResponse 
    {
        $cityTariff = CityTariff::find($id);
        $cityTariff->price = $request->input('price');
        $cityTariff->save();

        return redirect()->route('admin.city-tariffs.index');
    }
    
    public function destroy(Request $request, string $id): RedirectResponse 
    {
        CityTariff::where('id', $id)->delete();
        
        return redirect()->route('admin.city-tariffs.index');
    }

    public function getTariffsByCity(string $cityId): Collection
    {
        return CityTariff::getCityTariffs($cityId);
    }
}
