<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    public function run(): void
    {
        PropertyType::create(['name' => 'Piso']);
        PropertyType::create(['name' => 'Chalet']);
        PropertyType::create(['name' => 'Oficina']);
    }
}
