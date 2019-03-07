<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateYearSeeder::class);
        $this->call(CreateAgencySeeder::class);
        $this->call(CreateUserSeeder::class);
    }
}
