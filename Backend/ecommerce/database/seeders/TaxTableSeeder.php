<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taxes')->insert([
            'province' => 'BC',
            'gst' => 0.05,
            'pst' => 0.07,
            'vat' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}