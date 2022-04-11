<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->string('avatar');
            $table->string('school_name');
            $table->string('s_exam_name');
            $table->string('s_group');
            $table->string('s_pass_year');
            $table->string('s_gpa');
            $table->string('college_name');
            $table->string('c_exam_name');
            $table->string('c_group');
            $table->string('c_pass_year');
            $table->string('c_gpa');
            $table->string('versity_name');
            $table->string('degree');
            $table->string('subject');
            $table->string('v_pass_year');
            $table->string('v_cgpa');
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
        Schema::dropIfExists('resumes');
    }
}
