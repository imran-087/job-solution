<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('slug');
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->enum('status', ['deactive', 'active'])->default('active');
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
        Schema::dropIfExists('main_categories');
    }
}
