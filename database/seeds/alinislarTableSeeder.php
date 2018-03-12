<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class alinislarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alinislar')->insert([

            'name' => "Alanya 09:45",
            'tur_id' => "1",

        ]);

        DB::table('alinislar')->insert([

            'name' => "Konaklı 09:00",
            'tur_id' => "1",

        ]);

        DB::table('alinislar')->insert([

            'name' => "Türkler 08:45",
            'tur_id' => "1",

        ]);

        DB::table('alinislar')->insert([

            'name' => "Alanya 09:30",
            'tur_id' => "2",

        ]);

        DB::table('alinislar')->insert([

            'name' => "Konaklı 09:00",
            'tur_id' => "2",

        ]);

    }
}
