<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    // table名指定
    // protected $table = 'tasks';
    // 更新可能フィールド
    protected $fillable = [
        'task_name'
    ];
}
