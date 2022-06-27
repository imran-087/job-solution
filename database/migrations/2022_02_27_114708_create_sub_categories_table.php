<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name');
            $table->foreignId('institute_id')->nullable()->constrained();
            $table->string('question_type', 10)->nullable();
            $table->string('subject_code_1')->nullable();
            $table->string('subject_code_2')->nullable();
            $table->string('subject_code_3')->nullable();
            $table->string('number_of_question')->nullable();
            $table->string('total_marks')->nullable();
            $table->dateTime('exam_date')->nullable();
            $table->string('exam_duration')->nullable();
            $table->string('job_position')->nullable();
            $table->string('negative_marks')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->integer('year_id')->nullable();
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->enum('status', ['active', 'deactive', 'complete'])->default('active');
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
        Schema::dropIfExists('sub_categories');
    }
}
