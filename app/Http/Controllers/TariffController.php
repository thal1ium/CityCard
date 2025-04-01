<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffStoreRequest;
use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index() 
    {
        $tariffs = Tariff::all();

        return view('admin.tariffs.index', ['tariffs' => $tariffs]);
    }

    public function create() 
    {
        return view('admin.tariffs.create');
    }

    public function store(TariffStoreRequest $request) 
    {
        $request->validated();
        
        Tariff::create($request->only('type'));

        return redirect()->route('admin.tariffs.create');
    }

    public function update(Request $request, string $id) 
    {
        $city = Tariff::find($id);
        $city->type = $request->input('type');
        $city->save();

        return redirect()->route('admin.tariffs.index');
    }
    
    public function destroy(Request $request, string $id) 
    {
        Tariff::where('id', $id)->delete();
        
        return redirect()->route('admin.tariffs.index');
    }
}
