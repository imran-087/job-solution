<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained(); //from categories table
            $table->foreignId('sub_category_id')->nullable()->constrained(); //from sub_categories_table
            $table->foreignId('user_id')->constrained(); //from users table -- this will be examiner id
            $table->string('name');
            $table->enum('examinee_type', ['user', 'subscriber'])->default('user'); // User/Subscriber user who are eligible for participating exxam
            $table->enum('exam_mode', ['private', 'public']);
            $table->dateTime('time')->nullable();
            $table->smallInteger('number_of_question');
            $table->smallInteger('mark')->default(0);
            $table->smallInteger('cut_mark')->default(0);
            $table->smallInteger('exam_price')->default(0);
            $table->smallInteger('discount_price')->nullable();
            $table->smallInteger('required_point')->default(0);
            $table->smallInteger('negative_mark')->default(0);
            $table->enum('exam_status', ['published', 'unpublished', 'closed']);
            $table->dateTime('exam_starting_time');
            $table->integer('updated_user_id')->nullable();
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
        Schema::dropIfExists('exams');
    }
}
