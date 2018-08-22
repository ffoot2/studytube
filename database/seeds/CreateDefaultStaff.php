<?php

use Illuminate\Database\Seeder;
use App\Staff;

class CreateDefaultStaff extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create(['name' => 'admin', 'email' => 'admin@test.com', 'password' => Hash::make('1qaz2wsx3edc')]);
    }
}
