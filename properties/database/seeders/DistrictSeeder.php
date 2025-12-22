<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        District::create(['name' => 'Distrito 1']);
        District::create(['name' => 'Distrito 2']);
    }
}
