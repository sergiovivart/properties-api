<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        Region::create(['name' => 'Región 1']);
        Region::create(['name' => 'Región 2']);
    }
}
