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
            $table->foreignId('question_parent_instruction_id')->constrained();
            $table->foreignId('main_category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->foreignId('subject_id')->nullable()->constrained();
            $table->foreignId('year_id')->nullable()->constrained();
            $table->string('instruction_no');
            $table->text('instruction')->nullable();
            $table->string('mark')->nullable();
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
