<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use Illuminate\Support\Str;

class TestPropertySeeder extends Seeder
{
    public function run(): void
    {
        // Crear 5 propiedades de prueba
        for ($i = 1; $i <= 5; $i++) {
            Property::create([
                'ulid' => Str::ulid(),
                'intern_reference' => "PROP-TEST-$i",
                'title' => "Piso de prueba $i",
                'street' => "Calle Test $i",
                'number' => $i,
                'zip_code' => '46001',
                'is_active' => true,
                'is_sell' => true,
                'sell_price' => 100000 + ($i * 5000),
                'is_rent' => true,
                'rental_price' => 500 + ($i * 50),
                'built_m2' => 80 + ($i * 5),
                'office_id' => 1, // Oficina del usuario de prueba
                'property_type_id' => 1,
                'user_id' => 1,
                'secondary_user_id' => null,
                'neighborhood_id' => 1,
                'district_id' => 1,
                'municipality_id' => 1,
                'region_id' => 1,
                'location_id' => 1,
            ]);
        }
    }
}
