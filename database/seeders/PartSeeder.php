<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('parts')->insert([
            'number' => '3005',
            'description' => 'Brick 1 x 1'
        ]);
    }
}
