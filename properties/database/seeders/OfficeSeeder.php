<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    public function run(): void
    {
        Office::create(['name' => 'Valencia Centro']);
        Office::create(['name' => 'Madrid Norte']);
    }
}
