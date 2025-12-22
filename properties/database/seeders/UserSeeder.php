<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Office;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $office = Office::first();

        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => bcrypt('password'),
            'office_id' => $office->id,
        ]);

        User::create([
            'name' => 'María López',
            'email' => 'maria@example.com',
            'password' => bcrypt('password'),
            'office_id' => $office->id,
        ]);
    }
}
