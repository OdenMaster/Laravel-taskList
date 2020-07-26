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
        $this->call(taskSeeder::class);
        $this->call(taskFactorySeeder::class);
        $this->call(taskStatesSeeder::class);
    }
}
