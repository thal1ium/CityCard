<?php

namespace App\Http\Controllers;

use App\Models\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index() {
        $tariffs = Tariff::all();

        return view('admin.tariffs.index', ['tariffs' => $tariffs]);
    }

    public function create() {
        return view('admin.tariffs.create');
    }

    public function store(Request $request) {
        $request->validate([
            "type" => "required|string|max:255"
        ]);
        
        Tariff::create($request->only('type'));

        return redirect()->route('admin.tariffs.create');
    }

    public function update(Request $request, $id) {
        $city = Tariff::find($id);
        $city->type = $request->input('type');
        $city->save();

        return redirect()->route('admin.tariffs.index');
    }
    
    public function destroy(Request $request, $id) {
        Tariff::where('id', $id)->delete();
        
        return redirect()->route('admin.tariffs.index');
    }
}
