<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operation;
use App\Models\Property;

class OperationSeeder extends Seeder
{
    public function run(): void
    {
        $property = Property::first();

        Operation::create([
            'property_id' => $property->id,
            'status' => 'open',
            'is_closed' => false,
        ]);

        Operation::create([
            'property_id' => $property->id,
            'status' => 'closed',
            'is_closed' => true,
        ]);
    }
}
