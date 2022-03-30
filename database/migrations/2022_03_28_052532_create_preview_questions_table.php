<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviewQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preview_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('main_category_id');
            $table->integer('sub_category_id');
            $table->integer('subject_id');
            $table->integer('year_id')->nullable();
            $table->integer('passage_id')->nullable();
            $table->enum('question_type', ['mcq', 'written', 'image', 'samprotik'])->default('mcq');
            $table->text('question');
            $table->string('option_1')->nullable();
            $table->string('option_2')->nullable();
            $table->string('option_3')->nullable();
            $table->string('option_4')->nullable();
            $table->string('option_5')->nullable();
            $table->longText('image_option')->nullable();
            $table->string('answer')->nullable();
            $table->longText('written_answer')->nullable();
            $table->integer('mark');
            $table->enum('hard_level', ['easy', 'medium', 'hard'])->default('easy');
            $table->text('slug')->nullable();
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->integer('approval_id')->nullable();
            $table->unsignedBigInteger('view_count')->nullable();
            $table->unsignedBigInteger('vote')->nullable();
            $table->enum('lock_status', ['lock', 'unlock'])->default('unlock');
            $table->enum('future_editable', ['editable', 'noteditable'])->default('noteditable');
            $table->enum('status', ['active', 'deactive', 'pending'])->default('active');
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
        Schema::dropIfExists('preview_questions');
    }
}
