<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(turlarTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(alinislarTableSeeder::class);
        $this->call(otellerTableSeeder::class);
        $this->call(rehberlerTableSeeder::class);
       // $this->call(EventsTableSeeder::class);
    }
}
