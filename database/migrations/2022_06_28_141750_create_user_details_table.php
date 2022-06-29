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
            $table->foreignId('uesr_id')->constrained();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('email');
            $table->timestamp('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('religion', ['islam', 'hinduism', 'christianity', 'buddhism', 'judaism', 'other']);
            $table->enum('marital_status', ['married', 'unmarried']);
            $table->string('nationality')->default('bangladeshi');
            $table->string('national_id')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('mobile_no_primary', 15)->nullable();
            $table->string('mobile_no_secondary', 15)->nullable();
            $table->string('emergency_contact', 15)->nullable();
            $table->enum('blood_group', ['a+', 'a-', 'b+', 'b-', 'o+', 'o-', 'ab+', 'ab-']);
            $table->json('present_address')->nullable();
            $table->json('permanent_address')->nullable();

            //disability information
            $table->string('national_disability_id')->nullable();
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
