<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PhoneFormatter;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;

class UserAuthController extends Controller
{
    public function login(UserLoginRequest $userLoginRequest): JsonResponse
    {
        $credentials = $userLoginRequest->only('phone', 'password');

        if (!Auth::guard('web')->attempt($credentials)) {
            return response()->json(
                [
                    'message' => 'Неправильний логін або пароль',
                ],
                401,
            );
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $token = $user->createToken('user-token')->plainTextToken;

        return response()->json([
            'message' => 'Успішний вхід',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function register(UserRegisterRequest $userRegisterRequest): JsonResponse
    {
        try {
            $validatedNumber = PhoneFormatter::normalize($userRegisterRequest->phone);
            
            if (!$validatedNumber) {
                return response()->json(
                    [
                        'message' => 'Неправильний номер телефону',
                    ],
                    422,
                );
            }

            $existingUser = User::where('phone', $validatedNumber)->first();

            if ($existingUser) {
                return response()->json(
                    [
                        'message' => 'Користувач з таким номером телефону вже існує',
                    ],
                    422,
                );
            }

            $user = User::create([
                'phone' => $validatedNumber,
                'password' => Hash::make($userRegisterRequest->password),
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'message' => 'Помилка при створенні користувача: ' . $e->getMessage(),
                ],
                500,
            );
        }

        $token = $user->createToken('user-token')->plainTextToken;

        return response()->json([
            'message' => 'Успішна реєстрація',
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function logout(): JsonResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json([
            'message' => 'Успішний вихід',
        ]);
    }
}
