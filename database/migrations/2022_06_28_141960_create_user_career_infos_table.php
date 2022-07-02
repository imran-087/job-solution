<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCareerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_career_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('objective');
            $table->string('present_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->enum('job_level',['entry', 'mid', 'top']);
            $table->enum('job_nature',['full_time', 'part_time', 'contract', 'internship', 'freelance']);
            $table->string('job_categories')->nullable(); //functional category & industrial category
            $table->string('special_skill')->nullable(); 
            $table->string('prefferd_city')->nullable();
            $table->string('carrer_summary')->nullable();
            $table->string('special_qualification')->nullable();
            $table->string('keyword')->nullable();
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
        Schema::dropIfExists('user_career_infos');
    }
}
