<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('main_category_id');
            $table->integer('sub_category_id');
            $table->integer('subject_id');
            $table->integer('year_id')->nullable();
            $table->integer('passage_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->enum('question_type', ['mcq', 'passage', 'image'])->default('mcq');
            $table->text('question');
            $table->integer('mark');
            $table->enum('hard_level', ['easy', 'medium', 'hard'])->default('easy');
            $table->text('slug')->nullable();
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->integer('approval_id')->nullable();
            $table->unsignedBigInteger('view_count')->nullable();
            $table->unsignedBigInteger('vote')->default(0);
            $table->enum('lock_status', ['lock', 'unlock'])->default('unlock');
            $table->enum('future_editable', ['editable', 'noteditable'])->default('noteditable');
            $table->enum('status', ['active', 'deactive', 'pending'])->default('active');
            $table->string('video_url')->nullable();
            $table->string('youtube_url')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
