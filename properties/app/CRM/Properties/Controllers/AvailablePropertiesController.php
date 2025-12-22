<?php

namespace App\CRM\Properties\Controllers;

use App\CRM\Properties\Requests\AvailableForOperationsRequest;
use App\CRM\Properties\Queries\AvailableForOperationsQuery;
use App\CRM\Properties\Resources\AvailablePropertyResource;
use Illuminate\Http\JsonResponse;

class AvailablePropertiesController
{
    /**
     * Endpoint GET /api/properties/available-for-operations
     *
     * @param AvailableForOperationsRequest $request
     * @return JsonResponse
     */
    public function index(AvailableForOperationsRequest $request): JsonResponse
    {
        // Request validado
        $filters = $request->validated();

        // Crear la Query y aplicar filtros
        $query = (new AvailableForOperationsQuery())
            ->applyFilters($filters);

        // Paginación
        $perPage = $filters['per_page'] ?? 20;
        $page = $filters['page'] ?? 1;
        $properties = $query->paginate($perPage, $page);

        // Devolver recurso con paginación
        return AvailablePropertyResource::collection($properties)
            ->response()
            ->setStatusCode(200);
    }
}
