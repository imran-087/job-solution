<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('religion', ['islam', 'hinduism', 'christianity', 'buddhism', 'judaism', 'other'])->nullable();
            $table->enum('marital_status', ['married', 'unmarried', 'single'])->nullable();
            $table->string('nationality')->default('bangladeshi');
            $table->string('national_id')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('passport_issue_date')->nullable();
            $table->string('primary_mobile', 15)->nullable();
            $table->string('secondary_mobile', 15)->nullable();
            $table->string('emergency_contact', 15)->nullable();
            $table->enum('blood_group', ['a+', 'a-', 'b+', 'b-', 'o+', 'o-', 'ab+', 'ab-'])->nullable();
            $table->json('present_address')->nullable();
            $table->json('permanent_address')->nullable();

            //user professional photo
            $table->string('photo_path')->nullable();

            //disability information
            $table->enum('disability', ['yes', 'no'])->default('no');
            $table->enum('show_on_resume', ['yes', 'no'])->default('no');
            $table->string('disability_id')->nullable();
            $table->enum('disability_see', ['some', 'lot', 'cannot'])->nullable();
            $table->enum('disability_hear', ['some', 'lot', 'cannot'])->nullable();
            $table->enum('disability_remember', ['some', 'lot', 'cannot'])->nullable();
            $table->enum('disability_physical', ['some', 'lot', 'cannot'])->nullable();
            $table->enum('disability_communicate', ['some', 'lot', 'cannot'])->nullable();
            $table->enum('disability_care', ['some', 'lot', 'cannot'])->nullable();



            // skill description & extracurricular
            $table->string('skill_description')->nullable();
            $table->string('extracurricular')->nullable();

            //retired_army person
            $table->string('ba_no')->nullable();
            $table->string('number')->nullable();
            $table->string('ranks')->nullable();
            $table->string('type')->nullable();
            $table->string('arms')->nullable();
            $table->string('trade')->nullable();
            $table->string('course')->nullable();
            $table->timestamp('date_of_commision')->nullable();
            $table->timestamp('date_of_retirement')->nullable();

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
        Schema::dropIfExists('user_details');
    }
}
