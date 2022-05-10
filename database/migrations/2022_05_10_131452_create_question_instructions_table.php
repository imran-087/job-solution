<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_instructions', function (Blueprint $table) {
            $table->id();
            $table->integer('main_category_id');
            $table->integer('sub_category_id');
            $table->integer('subject_id');
            $table->integer('year_id')->nullable();
            $table->text('instruction');
            $table->string('instruction_no');
            $table->integer('created_user_id');
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
        Schema::dropIfExists('question_instructions');
    }
}
