<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TransportStoreRequest;
use App\Http\Requests\TransportUpdateRequest;
use App\Models\Transport;

class TransportController extends Controller
{
    public function index(): JsonResponse
    {
        $transports = Transport::all();

        return response()->json([
            'tariffs' => $transports,
        ]);
    }

    public function store(TransportStoreRequest $transportStoreRequest): JsonResponse
    {
        Transport::create($transportStoreRequest->validated());

        return response()->json([
            'message' => 'Транспорт добавленно',
        ], 201);
    }

    public function update(TransportUpdateRequest $transportUpdateRequest, Transport $transport): JsonResponse
    {
        $transport->update($transportUpdateRequest->validated());
        $transport->save();

        return response()->json([
            'message' => 'Транспорт оновленно',
        ]);
    }

    public function destroy(Transport $transport): JsonResponse
    {
        if (!$transport) {
            return response()->json([
                'message' => 'Транспорт не знайдено',
            ], 404);
        }

        $transport->delete();

        return response()->json([
            'message' => 'Транспорт видаленно',
        ], 204);
    }
}
