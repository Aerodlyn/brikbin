<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->admin()
            ->create([
                'email' => 'patrick@aerodlyn.io',
                'name'  => 'Patrick Jahnig',
            ]);
    }
}
