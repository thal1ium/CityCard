<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffStoreRequest;
use App\Models\Tariff;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    public function index(): View 
    {
        $tariffs = Tariff::all();

        return view('admin.tariffs.index', ['tariffs' => $tariffs]);
    }

    public function create() 
    {
        return view('admin.tariffs.create');
    }

    public function store(TariffStoreRequest $request): RedirectResponse 
    {
        $request->validated();
        
        Tariff::create($request->only('type'));

        return redirect()->route('admin.tariffs.create');
    }

    public function update(Request $request, Tariff $tariff): RedirectResponse 
    {
        $tariff->type = $request->input('type');
        $tariff->save();

        return redirect()->route('admin.tariffs.index');
    }
    
    public function destroy(Tariff $tariff): RedirectResponse 
    {
        $tariff->delete();
        
        return redirect()->route('admin.tariffs.index');
    }
}
