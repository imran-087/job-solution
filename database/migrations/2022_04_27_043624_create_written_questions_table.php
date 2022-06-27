<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWrittenQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('written_questions', function (Blueprint $table) {
            $table->id();
            $table->nestedSet();
            $table->string('question_no')->nullable();
            $table->text('question');
            $table->tinyInteger('question_instruction')->default(0);
            $table->foreignId('main_category_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->foreignId('subject_id')->nullable()->constrained();
            $table->foreignId('year_id')->nullable()->constrained();
            $table->text('question_or')->nullable();
            $table->string('mark')->nullable();
            $table->string('slug')->nullable();
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->unsignedBigInteger('view_count')->nullable();
            $table->unsignedBigInteger('vote')->default(0);
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
        Schema::dropIfExists('written_questions');
    }
}
