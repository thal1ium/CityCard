<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Card;
use App\Models\City;
use App\Models\Tariff;
use App\Models\Transport;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {        
        return view('home');
    }

    public function showCards(): View
    {
        return view('user.cards', ['cards' => Card::getCards()]);
    }

    public function showAddCard(): View
    {
        return view('user.add-card', ['tariffs' => Tariff::getTariffs(), 'cities' => City::getCities(), 'transports' => Transport::getTransports()]);
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $request->validated();
    
        $cardNumber = mt_rand(1000000000, 9999999999);
        $balance = mt_rand(100, 3000);
        $userId = Auth::id();

        Card::create([
            'number' => $cardNumber,
            'balance' => $balance,
            'user_id' => $userId,
            'tariff_id' => $request->tariff_id,
        ]);
    
        return redirect()->route('user.show.cards');
    }
}
