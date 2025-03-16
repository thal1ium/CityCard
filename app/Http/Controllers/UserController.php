<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\City;
use App\Models\Tariff;
use App\Models\Transport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function showCards()
    {
        return view('user.cards', ['cards' => Card::getCards()]);
    }

    public function showAddCard()
    {
        return view('user.add-card', ['tariffs' => Tariff::getTariffs(), 'cities' => City::getCities(), 'transports' => Transport::getTransports()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tariff_id' => 'required|exists:users,id',
        ]);
    
        $cardNumber = mt_rand(1000000000, 9999999999);
        $balance = mt_rand(100, 3000);
        $userId = Auth::id();

        Card::create([
            'number' => $cardNumber,
            'balance' => $balance,
            'user_id' => $userId,
            'tariff_id' => $request->tariff_id,
        ]);
    
        // Redirect back to the cards page
        return redirect()->route('user.show.cards');
    }
}
