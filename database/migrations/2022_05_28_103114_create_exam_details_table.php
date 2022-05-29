<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateExamDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained(); //from subject_table 
            $table->smallInteger('number_of_question'); //Numbers_Of_Question_Per_Subject 
            $table->json('question_ids')->nullable(); //from question_table 
            $table->json('question_mark')->nullable(); //Per_Question_Mark[Array/String]  map to per question_id 
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
        Schema::dropIfExists('exam_details');
    }
}
