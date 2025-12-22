<?php

namespace App\CRM\Properties\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvailableForOperationsRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a hacer esta request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Todos los usuarios autenticados pueden hacer esta request,
        // la restricción por rol/oficina se aplicará en la Query
        return $this->user() !== null;
    }

    /**
     * Reglas de validación para los query parameters
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'property_type_id' => ['nullable', 'integer', 'exists:property_types,id'],
            'office_id'        => ['nullable', 'integer', 'exists:offices,id'],
            'zone_type'        => ['nullable', 'string', 'in:neighborhood,district,municipality,region,location'],
            'zone_id'          => ['nullable', 'integer'],
            'operation_type'   => ['nullable', 'string', 'in:sale,rent'],
            'min_price'        => ['nullable', 'numeric', 'min:0'],
            'max_price'        => ['nullable', 'numeric', 'min:0'],
            'min_surface_m2'   => ['nullable', 'integer', 'min:0'],
            'max_surface_m2'   => ['nullable', 'integer', 'min:0'],
            'search'           => ['nullable', 'string', 'max:255'],
            'page'             => ['nullable', 'integer', 'min:1'],
            'per_page'         => ['nullable', 'integer', 'min:1', 'max:50'],
        ];
    }

    /**
     * Ajustes adicionales después de la validación
     */
    protected function prepareForValidation()
    {
        // Asegura que si zone_id viene, zone_type también debe venir
        if ($this->filled('zone_id') && !$this->filled('zone_type')) {
            $this->merge([
                'zone_type' => null
            ]);
        }
    }
}
