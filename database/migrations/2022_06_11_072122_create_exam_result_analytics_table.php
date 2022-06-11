<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_result_analytics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->nullable()->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('total_question');
            $table->integer('total_mark');
            $table->integer('duration')->nullable();
            $table->integer('cut_mark')->nullable()->default(0);
            $table->float('negative_mark')->nullable()->default(0);
            $table->integer('answered');
            $table->integer('right_ans');
            $table->integer('wrong_ans');
            $table->integer('not_ans');
            $table->float('obtain_mark');
            $table->dateTime('exam_time')->nullable();
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
        Schema::dropIfExists('exam_result_analytics');
    }
}
