<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginPage(): View 
    {
        return view('auth.login', ['role' => 'admin']);
    }

    public function login(AdminLoginRequest $request): RedirectResponse
    {
        $request->validated();

        $credentials = $request->only('login', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.index');
        }

        return back()->withErrors(['login' => 'Не правильний номер або пароль']);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        session()->invalidate(); 
        
        session()->regenerateToken(); 

        return redirect()->route('admin.show.login');
    }
}
