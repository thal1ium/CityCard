<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Card;
use App\Models\CardHistory;
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
        return view('user.cards', ['cards' => Card::getCards()]);
    }
    
    public function create(): View
    {
        return view('user.add-card', ['tariffs' => Tariff::getTariffs(), 'cities' => City::getCities(), 'transports' => Transport::getTransports()]);
    }

    public function transactions(): View
    {
        return view('user.transactions', ['transactions' => CardHistory::all()]);
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $request->validated();

        $cardNumber = mt_rand(1000000000, 9999999999);
        $balance = 0;
        $userId = Auth::id();

        Card::create([
            'number' => $cardNumber,
            'balance' => $balance,
            'user_id' => $userId,
            'city_tariff_id' => $request->tariff_id,
        ]);
    
        return redirect()->route('user.show.cards');
    }
}
