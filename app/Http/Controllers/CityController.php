<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityStoreRequest;
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

    public function update(Request $request, string $id): RedirectResponse 
    {
        $city = City::find($id);
        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('admin.cities.index');
    }
    
    public function destroy(Request $request, string $id): RedirectResponse 
    {
        City::where('id', $id)->delete();
        
        return redirect()->route('admin.cities.index');
    }
}
