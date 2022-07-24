<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert([
            'product_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_product')->insert([
            'product_id' => 1,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_product')->insert([
            'product_id' => 1,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('category_product')->insert([
            'product_id' => 1,
            'category_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        for ($i = 0; $i < 110; $i++) {
            DB::table('category_product')->insert([
                'product_id' => rand(1, 61),
                'category_id' => rand(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
