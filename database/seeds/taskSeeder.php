<?php

use Illuminate\Database\Seeder;

class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = ['あべ','ひろし'];
        foreach ($states as $state) {
            App\Task::create(['task_name' => $state]);
        }
    }
}

class taskFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\task::class, 5)->create();
    }
}
