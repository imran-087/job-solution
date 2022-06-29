<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAcademicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_academic_infos', function (Blueprint $table) {
            $table->id();
            $table->enum('level_of_education', ['school', 'college', 'versity']);
            $table->enum('degree', ['ssc', 'hsc', 'bsc_honours', 'msc', 'phd']);
            $table->string('major_group');
            $table->string('institute_name');
            $table->float('result')->nullable();
            $table->float('cgpa')->nullable();
            $table->float('scale')->nullable();
            $table->string('passing_year', 10)->nullable();
            $table->smallInteger('course_duration')->nullable();
            $table->string('achivement')->nullable();
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
        Schema::dropIfExists('user_academic_infos');
    }
}
