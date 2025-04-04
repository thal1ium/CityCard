<?php

namespace App\Http\Controllers\Api;

use App\Models\Card;
use App\Models\User;
use App\Models\CardHistory;
use Illuminate\Http\Request;
use App\Models\UserTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Wallet\WalletStoreRequest;
use App\Http\Requests\Wallet\WalletRefillRequest;

class WalletController extends Controller
{
    public function index()
    {
        return response()->json([
            'balance' => User::getBalance(),
        ]);
    }

    public function create()
    {
        return response()->json([
            'cards' => Card::getCards(),
            'balance' => User::getBalance(),
        ]);
    }
    public function store(WalletStoreRequest $walletStoreRequest)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        UserTransaction::create([
            'sum' => $walletStoreRequest->input('sum'),
            'operation' => 'Поповнення',
            'time' => now(),
            'user_id' => $user->id,
        ]);

        $user->balance += $walletStoreRequest->input('sum');

        $user->save();

        return response()->json([
            'message' => 'Рахунок поповненно'
        ]);
    }
    public function refill(WalletRefillRequest $walletRefillRequest) 
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $card = Card::where('id', $walletRefillRequest->input('selected_card'))->first();

        if (!$card) {
            return response()->json([
                'message' => 'Картка не знайдена',
            ], 404);
        }

        $sum = $walletRefillRequest->input('refill_amount');

        if (($user->balance <= 0) || ($user->balance - $sum < 0)) {
            return response()->json([
                'message' => 'Недостатньо коштів на балансі'
            ], 400);
        }

        CardHistory::create([
            'amount' => $sum,
            'transaction_type' => 'Поповнення',
            'time' => now(),
            'card_id' => $walletRefillRequest->input('selected_card'),
        ]);

        $user->balance -= $sum;
        $card->balance += $sum;

        $user->save();
        $card->save();

        return response()->json([
            'message' => 'Рахунок карточки поповненно'
        ]);
    }
}
