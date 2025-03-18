<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index() {
        $cities = City::all();

        return view('admin.cities.index', ['cities' => $cities]);
    }

    public function create() {
        return view('admin.cities.create');
    }

    public function store(Request $request) {
        $request->validate([
            "name" => "required|string|max:255"
        ]);
        
        City::create($request->only('name'));

        return redirect()->route('admin.cities.create');
    }

    public function update(Request $request, $id) {
        $city = City::find($id);
        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('admin.cities.index');
    }
    
    public function destroy(Request $request, $id) {
        City::where('id', $id)->delete();
        
        return redirect()->route('admin.cities.index');
    }
}
