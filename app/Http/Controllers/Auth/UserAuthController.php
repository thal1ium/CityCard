<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PhoneFormatter;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class UserAuthController extends Controller
{
    public function showLoginPage(): View
    {
        return view('auth.login', ['role' => 'user']);
    }

    public function showRegisterPage(): View
    {
        return view('auth.registration');
    }

    public function login(UserLoginRequest $request): RedirectResponse
    {
        $request->validated();

        $validatedNumber = PhoneFormatter::normalize($request->phone);

        $request->merge(['phone' => $validatedNumber]);

        $credentials = $request->only('phone', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors(['login' => 'Не правильний номер або пароль']);
    }

    public function register(UserRegisterRequest $request): RedirectResponse
    {
        $request->validated();

        try {
            $validatedNumber = PhoneFormatter::normalize($request->phone);
            
            if (!$validatedNumber) {
                throw new \Exception("Номер телефона не валідний");
            }

            $user = User::create([
                'phone' => $validatedNumber,
                'password' => Hash::make($request->password),
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Помилка при створенні користувача: ' . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('user.show.cards');
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('user.login');
    }
}
