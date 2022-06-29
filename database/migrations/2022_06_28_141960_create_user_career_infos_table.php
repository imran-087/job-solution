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
            $table->string('objective');
            $table->string('present_salary');
            $table->string('expected_salary');
            $table->enum('expected_job_level',['entry', 'mid', 'top']);
            $table->enum('job_nature',['full_time', 'part_time', 'contract', 'internship', 'freelance']);
            $table->json('job_categories');
            $table->string('city');
            $table->string('career_summary');
            $table->string('special_qualification');
            $table->string('keywords');
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
