<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Neighborhood;

class NeighborhoodSeeder extends Seeder
{
    public function run(): void
    {
        Neighborhood::create(['name' => 'Centro']);
        Neighborhood::create(['name' => 'Ruzafa']);
    }
}
