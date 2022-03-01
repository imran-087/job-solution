<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_descriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id');
            $table->longText('description');
            $table->integer('best_description')->nullable();
            $table->unsignedBigInteger('vote')->nullable();
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
        Schema::dropIfExists('question_descriptions');
    }
}
