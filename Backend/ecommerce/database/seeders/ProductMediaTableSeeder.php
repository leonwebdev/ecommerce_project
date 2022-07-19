<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_media')->insert([
            'product_id' => 1,
            'label' => 'dress',
            'image' => '1asdfavyjmyj.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_media')->insert([
            'product_id' => 1,
            'label' => 'coat',
            'image' => 'yhnnuikuolsef.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('product_media')->insert([
            'product_id' => 2,
            'label' => 'pants',
            'image' => 'wf4dweradayuj.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}