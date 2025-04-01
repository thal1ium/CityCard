<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransportStoreRequest;
use App\Models\Transport;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransportControler extends Controller
{
    public function index(): View
    {
        $transports = Transport::all();

        return view('admin.transports.index', ['transports' => $transports]);
    }

    public function create(): View
    {
        return view('admin.transports.create');
    }

    public function store(TransportStoreRequest $request): RedirectResponse
    {
        $request->validated();
        
        Transport::create($request->only('type'));

        return redirect()->route('admin.transports.create');
    }

    public function update(Request $request, Transport $transport): RedirectResponse
    {
        $transport->type = $request->input('type');
        $transport->save();

        return redirect()->route('admin.transports.index');
    }
    
    public function destroy(Transport $transport): RedirectResponse
    {
        $transport->delete();
        
        return redirect()->route('admin.transports.index');
    }
}
