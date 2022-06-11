<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained(); //from sub_categories_table
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //Examinee id
            $table->json('submitted_data'); //submitted answer for all questions. deafult 0
            $table->dateTime('staring_time')->nullable();
            $table->integer('duration')->nullable();
            $table->smallInteger('mark')->default(0);
            $table->smallInteger('cut_mark')->default(0);
            $table->smallInteger('negative_mark')->default(0);
            $table->integer('deleted_by')->nullable();
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
        Schema::dropIfExists('exam_results');
    }
}
