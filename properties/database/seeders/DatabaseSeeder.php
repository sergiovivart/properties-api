<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            OfficeSeeder::class,
            PropertyTypeSeeder::class,
            UserSeeder::class,
            NeighborhoodSeeder::class,
            DistrictSeeder::class,
            MunicipalitySeeder::class,
            RegionSeeder::class,
            LocationSeeder::class,
            PropertySeeder::class,
            OperationSeeder::class,
        ]);
    }
}
