<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'name' => 'women',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('genders')->insert([
            'name' => 'men',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('genders')->insert([
            'name' => 'girls',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('genders')->insert([
            'name' => 'boys',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}