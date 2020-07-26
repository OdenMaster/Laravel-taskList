<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use db\filed\enum\taskState;

class AddStateFieldToTasksTableAndCreateTaskStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('state')->after('task_name')->default(taskState::OPEN);
        });
        Schema::create('task_states', function (Blueprint $table) {
            $table->id();
            $table->integer('state_num')->unique()->default(taskState::OPEN);
            $table->string('state_name');
            // booleanで作成されるのはtinyint型、bit1ではないのでsigned 1byteの範囲で値を扱えてしまう
            $table->boolean('allow_user_ctrl')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('state');
        });
        Schema::dropIfExists('task_states');
    }
}
