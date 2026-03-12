<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Test',
            'lastname'  => 'User',          // required by migration
            'email'     => 'test@example.com',
            'mobile'    => '123',
            'role'      => 'buyer',         // optional – enum defaults to first value
            'password'  => '123123',        // cast will hash it
        ]);
    }
}
