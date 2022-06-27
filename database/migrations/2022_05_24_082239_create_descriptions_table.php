<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->morphs('descriptionable');
            $table->longText('description');
            $table->integer('best_description')->nullable();
            $table->unsignedBigInteger('vote')->default(0);
            $table->integer('created_user_id');
            $table->integer('updated_user_id')->nullable();
            $table->integer('approval_id')->nullable();
            $table->enum('status', ['active', 'pending', 'reject', 'approve'])->default('active');
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
        Schema::dropIfExists('descriptions');
    }
}
