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
            'province' => 'AB',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'BC',
            'gst' => 0.05,
            'pst' => 0.07,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'MB',
            'gst' => 0.05,
            'pst' => 0.07,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'NB',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'NL',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'NT',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'NS',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'NU',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'ON',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.13,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'PE',
            'gst' => 0,
            'pst' => 0,
            'hst' => 0.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'QC',
            'gst' => 0.05,
            'pst' => 0.09975,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'SK',
            'gst' => 0.05,
            'pst' => 0.06,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('taxes')->insert([
            'province' => 'YT',
            'gst' => 0.05,
            'pst' => 0,
            'hst' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}