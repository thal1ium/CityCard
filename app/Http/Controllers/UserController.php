<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        if (!Auth::check()) {
            return redirect()->route('auth.show.login');
        }

        return view('home');
    }
}
