<?php

use Illuminate\Database\Seeder;

class otellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oteller')->insert([

            'name' => "Kahya Otel",

        ]);

        DB::table('oteller')->insert([

            'name' => "Riviera Otel",

        ]);
    }
}
