<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('years')->truncate();
        $years = [];
        for ($i = 1; $i <= 10; $i++)
        {
            $years[] = [
                'year' => 2018 + $i,
                'created_at' => new DateTime,
        		'updated_at' => new DateTime
            ];
        }
        DB::table('years')->insert($years);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
