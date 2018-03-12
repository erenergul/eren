<?php

use Illuminate\Database\Seeder;

class rehberlerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rehberler')->insert([

            'rehber_adi' => "Rehber-1",

        ]);

    }
}
