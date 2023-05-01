<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            'name' => 'CTO',
        ]);

        DB::table('positions')->insert([
            'name' => 'Backend Developer',
        ]);

        DB::table('positions')->insert([
            'name' => 'Frontend Developer',
        ]);
    }
}
