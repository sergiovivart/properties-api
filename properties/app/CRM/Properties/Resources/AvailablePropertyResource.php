<?php

namespace App\CRM\Properties\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvailablePropertyResource extends JsonResource
{
    /**
     * Transformar la propiedad en JSON
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        // Determinar el tipo de operación y el precio correspondiente
        if ($this->is_sell && ($request->operation_type === 'sale' || !$request->operation_type)) {
            $operationType = 'sale';
            $price = $this->sell_price;
        } elseif ($this->is_rent && ($request->operation_type === 'rent' || !$request->operation_type)) {
            $operationType = 'rent';
            $price = $this->rental_price;
        } else {
            $operationType = $this->is_sell ? 'sale' : 'rent';
            $price = $this->is_sell ? $this->sell_price : $this->rental_price;
        }

        // Determinar zona
        $zone = null;
        if ($this->neighborhood) {
            $zone = [
                'type' => 'neighborhood',
                'id' => $this->neighborhood->id,
                'name' => $this->neighborhood->name,
            ];
        } elseif ($this->district) {
            $zone = [
                'type' => 'district',
                'id' => $this->district->id,
                'name' => $this->district->name,
            ];
        } elseif ($this->municipality) {
            $zone = [
                'type' => 'municipality',
                'id' => $this->municipality->id,
                'name' => $this->municipality->name,
            ];
        } elseif ($this->region) {
            $zone = [
                'type' => 'region',
                'id' => $this->region->id,
                'name' => $this->region->name,
            ];
        } elseif ($this->location) {
            $zone = [
                'type' => 'location',
                'id' => $this->location->id,
                'name' => $this->location->name,
            ];
        }

        return [
            'id' => $this->ulid,
            'intern_reference' => $this->intern_reference,
            'title' => $this->title,
            'address' => trim("{$this->street} {$this->number}, {$this->zip_code}"),
            'property_type' => $this->propertyType ? [
                'id' => $this->propertyType->id,
                'name' => $this->propertyType->name,
            ] : null,
            'zone' => $zone,
            'surface_m2' => $this->built_m2,
            'price' => $price,
            'operation_type' => $operationType,
            'is_sell' => $this->is_sell,
            'is_rent' => $this->is_rent,
            'office' => $this->office ? [
                'id' => $this->office->id,
                'name' => $this->office->name,
            ] : null,
            'main_agent' => $this->user ? [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ] : null,
            'created_at' => $this->created_at?->toIso8601String(),
        ];
    }
}
