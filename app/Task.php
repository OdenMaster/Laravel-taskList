<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // 更新可能フィールド
    protected $fillable = [
        'task_name',
        'state'
    ];

    public function joinTaskState()
    {
        return $this->belongsTo('App\TaskState', 'state', 'state_num');
    }
}
