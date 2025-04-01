<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index() : View
    {
        $cities = City::all();

        return view('admin.cities.index', ['cities' => $cities]);
    }

    public function create() 
    {
        return view('admin.cities.create');
    }

    public function store(CityStoreRequest $request): RedirectResponse 
    {
        $request->validated();
        
        City::create($request->only('name'));

        return redirect()->route('admin.cities.create');
    }

    public function update(CityUpdateRequest $request, City $city): RedirectResponse 
    {
        $request->validated();

        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('admin.cities.index');
    }
    
    public function destroy(City $city): RedirectResponse 
    {
        $city->delete();
        
        return redirect()->route('admin.cities.index');
    }
}
