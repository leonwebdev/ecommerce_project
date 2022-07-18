<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variants')->insert([
            'product_id' => 1,
            'size_id' => 1,
            'inventory' => 32,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}