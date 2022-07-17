<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id' => 1,
            'gst' => 0.05,
            'pst' => 0.07,
            'vat' => 0,
            'sub_total' => 50,
            'shipping_charge' => 5,
            'total' => 61,
            'order_status' => 'pending',
            'shipping_address' => '85 Good Ave, Calgary, Alberta, Canada, E4G 9C7',
            'billing_address' => '85 Good Ave, Calgary, Alberta, Canada, E4G 9C7',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}