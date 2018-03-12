<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class turlarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turlar')->insert([

            'name' => "Alanya Tekne Turu",

        ]);

        DB::table('turlar')->insert([

            'name' => "Alanya Jeep Safari",

        ]);
    }
}
