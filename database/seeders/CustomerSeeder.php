<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create(
            ['id' => 1, 'firstname' => 'Test', 'surname' => 'test', 'email' => 'test@example.com', 'type' => 'basic', 'password' => Hash::make('test')],
            ['id' => 2, 'firstname' => 'Pepe', 'surname' => 'perez', 'email' => 'pepe@example.com', 'type' => 'basic', 'password' => Hash::make('pepe')]
        );
    }
}
