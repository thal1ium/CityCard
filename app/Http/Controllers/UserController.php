<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('home');
    }

    public function showCards() {
        return view('user.cards', ['cards' => $this->getCards()]);
    }

    private function getCards() {
        return Card::with(['user', 'tariff', 'tariff.city'])->where('user_id', Auth::id())->get();
    }
}
