<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('channel_id');
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->integer('reply_id')->nullable();
            $table->unsignedBigInteger('vote')->nullable();
            $table->unsignedBigInteger('view')->nullable();
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
        Schema::dropIfExists('discussions');
    }
}
