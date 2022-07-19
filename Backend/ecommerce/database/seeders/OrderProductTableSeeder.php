<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->insert([
            'order_id' => 1,
            'product_id' => 1,
            'unit_price' => 1,
            'quantity' => 1,
            'line_price' => 1,
            'product_name' => 'Default Product Name',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}