<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamprotikQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samprotik_questions', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['bn', 'in', 'bn_in']);
            $table->text('question');
            $table->text('answer');
            $table->json('options')->nullable();
            $table->text('slug')->unique();
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->unsignedBigInteger('view_count')->nullable();
            $table->unsignedBigInteger('vote')->default(0);
            $table->enum('lock_status', ['lock', 'unlock'])->default('unlock');
            $table->enum('future_editable', ['editable', 'noteditable'])->default('editable');
            $table->enum('status', ['active', 'deactive'])->default('active');
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
        Schema::dropIfExists('samprotik_questions');
    }
}
