<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{
    public function index(): JsonResponse
    {
        $cities = City::all();

        return response()->json([
            'message' => 'cities',
            'cities' => $cities,
        ]);
    }

    public function store(CityStoreRequest $cityStoreRequest): JsonResponse
    {
        City::create($cityStoreRequest->validated());

        return response()->json([
            'message' => 'Місто добавленно',
        ], 201);
    }

    public function update(CityUpdateRequest $cityStoreRequest, City $city): JsonResponse
    {
        $city->update($cityStoreRequest->validated());
        $city->save();

        return response()->json([
            'message' => 'Місто оновленно',
        ]);
    }

    public function destroy(City $city): JsonResponse
    {
        if (!$city) {
            return response()->json([
                'message' => 'Місто не знайдено',
            ], 404);
        }

        $city->delete();

        return response()->json([
            'message' => 'Місто видаленно',
        ], 204);
    }
}
