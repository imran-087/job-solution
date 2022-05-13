<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionParentInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_parent_instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_category_id')->constrained();
            $table->string('parent_instruction_no');
            $table->text('parent_instruction')->nullable();
            $table->string('mark')->nullable();
            $table->integer('created_user_id');
            $table->softDeletes();
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
        Schema::dropIfExists('question_parent_instructions');
    }
}
