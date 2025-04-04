<?php

namespace App\Http\Controllers;

use App\Http\Requests\Wallet\WalletRefillRequest;
use App\Http\Requests\Wallet\WalletStoreRequest;
use App\Models\Card;
use App\Models\CardHistory;
use App\Models\User;
use App\Models\UserTransaction;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(): View
    {
        return view('user.wallet', ['balance' => User::getBalance()]);
    }

    public function create(): View
    {
        return view('user.refill-cards', ['cards' => Card::getCards(), 'balance' => User::getBalance()]);
    }

    public function store(WalletStoreRequest $walletStoreRequest)
    {
        $walletStoreRequest->validated();

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

        return redirect()->route('user.wallet.index');
    }

    public function refill(WalletRefillRequest $walletRefillRequest)
    {
        $walletRefillRequest->validated();

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $card = Card::where('id', $walletRefillRequest->input('selected_card'))->first();

        $sum = $walletRefillRequest->input('refill_amount');

        if (($user->balance <= 0) || ($user->balance - $sum < 0)) {
            return redirect()->back();
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

        return redirect()->back();
    }
}
