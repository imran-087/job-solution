<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_business');
            $table->string('designation');
            $table->string('department');
            $table->timestamp('from_date'); //employment_period
            $table->timestamp('to_date'); //employment_period
            $table->enum('currently_working', ['yes', 'no']); //employment_period
            $table->json('area_of_expertise');
            $table->string('address');

            //retired_army person
            $table->string('ba_no')->nullable();
            $table->string('ranks')->nullable();
            $table->string('type')->nullable();
            $table->string('arms')->nullable();
            $table->string('trade')->nullable();
            $table->string('course')->nullable();
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
        Schema::dropIfExists('user_experiences');
    }
}
