<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_rewards', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('obtain_mark_from');
            $table->smallInteger('obtain_mark_to');
            $table->smallInteger('reward_point'); //percentage
            $table->enum('staus', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_rewards');
    }
}
