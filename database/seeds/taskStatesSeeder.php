<?php

use Illuminate\Database\Seeder;

class taskStatesSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $states = ['未定義','オープン','クローズ'];
        foreach ($states as $index => $state) {
            if ($index === 0) {
                App\TaskState::create([
                    'state_num' => $index,
                    'state_name' => $state,
                    'allow_user_ctrl' => false
                    ]
                );
            }else {
                App\TaskState::create([
                    'state_num' => $index,
                    'state_name' => $state,
                    'allow_user_ctrl' => true
                    ]
                );
            }
        }
    }
}
