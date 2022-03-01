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
            $table->integer('sub_category_id');
            $table->integer('subject_id');
            $table->foreignId('year_id')->constrained('years');
            $table->integer('passage_id')->nullable();
            $table->tinyInteger('question_type');
            $table->text('question');
            $table->integer('mark');
            $table->tinyInteger('hard_level');
            $table->text('slug')->nullable();
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->integer('approval_id')->nullable();
            $table->unsignedBigInteger('view_count')->nullable();
            $table->unsignedBigInteger('vote')->nullable();
            $table->enum('lock_status', ['lock', 'unlock'])->default('unlock');
            $table->enum('future_editable', ['editable', 'noteditable'])->default('noteditable');
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
        Schema::dropIfExists('questions');
    }
}
