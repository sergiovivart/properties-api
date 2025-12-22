<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipality;

class MunicipalitySeeder extends Seeder
{
    public function run(): void
    {
        Municipality::create(['name' => 'Municipio 1']);
        Municipality::create(['name' => 'Municipio 2']);
    }
}
