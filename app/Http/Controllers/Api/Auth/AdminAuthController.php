<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(AdminLoginRequest $adminLoginRequest): JsonResponse
    {
        $crendentials = $adminLoginRequest->only('login', 'password');

        if (!Auth::guard('admin')->attempt($crendentials)) {
            return response()->json(
                [
                    'message' => 'Неправильний логін або пароль',
                ],
                401,
            );
        }

        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        $token = $admin->createToken('admin-token')->plainTextToken;

        return response()->json([
            'message' => 'Вхід',
            'token' => $token,
            'admin' => $admin,
        ]);
    }

    public function logout(): JsonResponse
    {
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        $admin->tokens()->delete();

        return response()->json([
            'message' => 'Вихід',
        ]);
    }
}
