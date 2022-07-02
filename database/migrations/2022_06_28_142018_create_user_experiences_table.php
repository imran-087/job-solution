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
            $table->foreignId('user_id')->constrained();
            $table->string('company_name');
            $table->string('company_business')->nullable();
            $table->string('designation');
            $table->string('department')->nullable();
            $table->timestamp('from_date'); //employment_period
            $table->timestamp('to_date')->nullable(); //employment_period
            $table->enum('currently_working', ['yes', 'no']); //employment_period
            $table->text('responsibilities')->nullable();
            $table->json('area_of_expertise'); //area name, number of month
            $table->string('address');

           

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
