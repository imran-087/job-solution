<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable()->default(0);
            $table->nestedSet();
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->string('name');
            $table->string('title')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('main_category_id');
            $table->string('description')->nullable();
            $table->string('slug')->unique();
            $table->string('meta_image')->nullable();
            $table->tinyInteger('future_editable')->nullable();
            $table->unsignedBigInteger('view_count')->nullable();
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->enum('status', ['active', 'deactive'])->default('active');
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
        Schema::dropIfExists('subjects');
    }
}
