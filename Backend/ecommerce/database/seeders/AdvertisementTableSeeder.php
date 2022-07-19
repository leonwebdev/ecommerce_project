<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdvertisementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisements')->insert([
            'image' => 'sflasintvalisvnafv241.jpg',
            'pages' => 'all',
            'area' => 'top',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}