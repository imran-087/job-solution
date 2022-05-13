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
            $table->foreignId('question_parent_instruction_id')->nullable()->constrained();
            $table->foreignId('question_instruction_id')->nullable()->constrained();
            $table->foreignId('main_category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->foreignId('subject_id')->nullable()->constrained();
            $table->foreignId('year_id')->nullable()->constrained();
            $table->string('question_no')->nullable();
            $table->text('question');
            $table->text('question_or')->nullable();
            $table->longText('answer')->nullable();
            $table->string('mark');
            $table->string('slug')->nullable();
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->unsignedBigInteger('view_count')->nullable();
            $table->unsignedBigInteger('vote')->default(0);
            $table->enum('status', ['active', 'deactive', 'pending'])->default('active');
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
