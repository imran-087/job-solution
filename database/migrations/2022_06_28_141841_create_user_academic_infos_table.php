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
            $table->foreignId('user_id')->constrained();
            $table->enum('degree_level', ['psc', 'jsc', 'sceondery', 'higersecondery', 'diploma', 'bechelor', 'masters', 'phd']);
            $table->string('degree_type');
            $table->string('major');
            $table->string('institute_name');
            $table->string('board');
            $table->float('result')->nullable();
            $table->float('marks')->nullable();  // %
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
