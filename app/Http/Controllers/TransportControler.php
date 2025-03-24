<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportControler extends Controller
{
    public function index() {
        $transports = Transport::all();

        return view('admin.transports.index', ['transports' => $transports]);
    }

    public function create() {
        return view('admin.transports.create');
    }

    public function store(Request $request) {
        $request->validate([
            "type" => "required|string|max:255"
        ]);
        
        Transport::create($request->only('type'));

        return redirect()->route('admin.transports.create');
    }

    public function update(Request $request, $id) {
        $transport = Transport::find($id);
        $transport->type = $request->input('type');
        $transport->save();

        return redirect()->route('admin.transports.index');
    }
    
    public function destroy(Request $request, $id) {
        Transport::where('id', $id)->delete();
        
        return redirect()->route('admin.transports.index');
    }
}
