<?php

namespace App\CRM\Properties\Queries;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AvailableForOperationsQuery
{
    protected Builder $query;

    public function __construct()
    {
        $this->query = Property::query()
            ->where('is_active', true) // Solo propiedades activas
            ->whereDoesntHave('operations', function (Builder $q) {
                $q->where('is_closed', false); // Sin operaciones activas
            });
    }

    /**
     * Aplica filtros basados en request validado
     */
    public function applyFilters(array $filters)
    {
        $user = Auth::user();

        // Autorización por oficina según rol
        if (! $user->hasAnyRole(['admin', 'god', 'commercial_director'])) {
            $this->query->where('office_id', $user->office_id);
        } elseif (!empty($filters['office_id'])) {
            $this->query->where('office_id', $filters['office_id']);
        }

        // Filtrado por tipo de propiedad
        if (!empty($filters['property_type_id'])) {
            $this->query->where('property_type_id', $filters['property_type_id']);
        }

        // Filtrado por zona
        if (!empty($filters['zone_type']) && !empty($filters['zone_id'])) {
            $zoneColumns = [
                'neighborhood' => 'neighborhood_id',
                'district' => 'district_id',
                'municipality' => 'municipality_id',
                'region' => 'region_id',
                'location' => 'location_id',
            ];

            $column = $zoneColumns[$filters['zone_type']] ?? null;

            if ($column) {
                $this->query->where($column, $filters['zone_id']);
            }
        }

        // Precios y tipo de operación
        if (!empty($filters['operation_type'])) {
            if ($filters['operation_type'] === 'sale') {
                $this->query->whereNotNull('sell_price');
                if (!empty($filters['min_price'])) {
                    $this->query->where('sell_price', '>=', $filters['min_price']);
                }
                if (!empty($filters['max_price'])) {
                    $this->query->where('sell_price', '<=', $filters['max_price']);
                }
            } elseif ($filters['operation_type'] === 'rent') {
                $this->query->whereNotNull('rental_price');
                if (!empty($filters['min_price'])) {
                    $this->query->where('rental_price', '>=', $filters['min_price']);
                }
                if (!empty($filters['max_price'])) {
                    $this->query->where('rental_price', '<=', $filters['max_price']);
                }
            }
        } else {
            // Si no se especifica, incluir propiedades con sell_price o rental_price
            $this->query->where(function ($q) {
                $q->whereNotNull('sell_price')
                  ->orWhereNotNull('rental_price');
            });
        }

        // Superficie
        if (!empty($filters['min_surface_m2'])) {
            $this->query->where('built_m2', '>=', $filters['min_surface_m2']);
        }
        if (!empty($filters['max_surface_m2'])) {
            $this->query->where('built_m2', '<=', $filters['max_surface_m2']);
        }

        // Búsqueda
        if (!empty($filters['search'])) {
            $search = strtolower($filters['search']);
            $this->query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(street) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(intern_reference) LIKE ?', ["%{$search}%"]);
            });
        }

        return $this;
    }

    /**
     * Ordena y aplica paginación
     */
    public function paginate(int $perPage = 20, int $page = 1)
    {
        return $this->query
            ->orderByDesc('created_at')
            ->paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * Devuelve la query sin paginar
     */
    public function getQuery(): Builder
    {
        return $this->query;
    }
}
