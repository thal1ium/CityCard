<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityTariffStoreRequest;
use App\Http\Requests\CityTariffUpdateRequest;
use App\Models\CityTariff;

class CityTariffController extends Controller
{
    public function index(): JsonResponse
    {
        $cityTariffs = CityTariff::all();

        return response()->json([
            'cityTariffs' => $cityTariffs,
        ]);
    }

    public function store(CityTariffStoreRequest $cityTariffStoreRequest): JsonResponse
    {
        CityTariff::create($cityTariffStoreRequest->validated());

        return response()->json(
            [
                'message' => 'Тариф міста добавленно',
            ],
            201,
        );
    }

    public function update(CityTariffUpdateRequest $cityTariffUpdateRequest, CityTariff $cityTariff): JsonResponse
    {
        $cityTariff->update(attributes: $cityTariffUpdateRequest->validated());
        $cityTariff->save();

        return response()->json([
            'message' => 'Тариф міста оновленно',
        ]);
    }

    public function destroy(CityTariff $cityTariff): JsonResponse
    {
        if (!$cityTariff) {
            return response()->json(
                [
                    'message' => 'Тариф міста не знайдено',
                ],
                404,
            );
        }

        $cityTariff->delete();

        return response()->json(
            [
                'message' => 'Тариф міста видаленно',
            ],
            204,
        );
    }

    public function getTariffsByCity(string $cityId): JsonResponse
    {
        return response()->json([
            'tariffByCity' => CityTariff::getCityTariffs($cityId)
        ]);
    }
}
