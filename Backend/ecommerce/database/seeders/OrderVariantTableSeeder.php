<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderVariantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_variants')->insert([
            'order_id' => 1,
            'variant_id' => 1,
            'price' => 3,
            'quantity' => 1,
            'product_name' => 'Girl Dress L',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}