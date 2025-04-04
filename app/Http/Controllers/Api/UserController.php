<?php

namespace App\Http\Controllers\Api;

use App\Models\Card;
use App\Models\City;
use App\Models\Tariff;
use App\Models\Transport;
use App\Models\CardHistory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $cards = Card::getCards();

        return response()->json([
            'cards' => $cards,
        ]);
    }
    
    public function create(): JsonResponse
    {
        return response()->json([
            'tariffs' => Tariff::getTariffs(),
            'cities' => City::getCities(),
            'transports' => Transport::getTransports(),
        ]);
    }

    public function transactions(): JsonResponse 
    {
        return response()->json([
            'transactions' => CardHistory::all()
        ]);
    }

    public function store(UserStoreRequest $userStoreRequest): JsonResponse 
    {
        $cardNumber = mt_rand(1000000000, 9999999999);
        $balance = 0;
        $userId = Auth::id();

        Card::create([
            'number' => $cardNumber,
            'balance' => $balance,
            'user_id' => $userId,
            'city_tariff_id' => $userStoreRequest->tariff_id,
        ]);

        return response()->json([
            'message' => 'Картака добавленна'
        ]);
    }
}
