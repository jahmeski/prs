<?php

use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'James Faderon',
                'email' => 'james@faderon.com',
                'agency_id' => 6,
                'password' => bcrypt('12345')
            ]
        ]);
    }
}
