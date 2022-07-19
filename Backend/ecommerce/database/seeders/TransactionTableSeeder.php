<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'order_id' => 1,
            'response' => '200',
            'status' => '200',
            'credit_card_info' => '0356',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}