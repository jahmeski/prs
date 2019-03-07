<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateAgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // FOREIGN KEY CONSTRAINT SOLUTION 1701
        DB::table('agencies')->truncate();

        $groups = [
        	['id' => 1, 'name' => 'Planning Service', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 2, 'name' => 'Operations', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 3, 'name' => 'Human Resource', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 4, 'name' => 'Policy Research Service', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 5, 'name' => 'Macroeconomic Policy Division', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 6, 'name' => 'Trade Remedy Unit', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 7, 'name' => 'Department of Agriculture - OSec', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        	['id' => 8, 'name' => 'Bureau of Animal Industry', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ];

        DB::table('agencies')->insert($groups);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
