<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        Location::create(['name' => 'Valencia']);
        Location::create(['name' => 'Madrid']);
    }
}
