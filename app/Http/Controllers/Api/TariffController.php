<?php

namespace App\Http\Controllers\Api;

use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TariffStoreRequest;
use App\Http\Requests\TariffUpdateRequest;

class TariffController extends Controller
{
    public function index(): JsonResponse
    {
        $tariffs = Tariff::all();

        return response()->json([
            'tariffs' => $tariffs,
        ]);
    }

    public function store(TariffStoreRequest $tariffStoreRequest): JsonResponse
    {
        Tariff::create($tariffStoreRequest->validated());

        return response()->json([
            'message' => 'Тариф добавленно',
        ], 201);
    }

    public function update(TariffUpdateRequest $tariffUpdateRequest, Tariff $tariff): JsonResponse
    {
        $tariff->update($tariffUpdateRequest->validated());
        $tariff->save();

        return response()->json([
            'message' => 'Тариф оновленно',
        ]);
    }

    public function destroy(Tariff $tariff): JsonResponse
    {
        if (!$tariff) {
            return response()->json([
                'message' => 'Тариф не знайдено',
            ], 404);
        }

        $tariff->delete();

        return response()->json([
            'message' => 'Тариф видаленно',
        ], 204);
    }
}
