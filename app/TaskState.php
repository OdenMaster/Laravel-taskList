<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskState extends Model
{
    protected $table = 'task_states';
    public $timestamps = false;

    // public function joinus()
    // {
    //     return $this->hasMany('App\Task', 'state_num'. 'state');
    // }
}
