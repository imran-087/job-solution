<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->morphs('subscriptionable');
            $table->enum('status', ['pending', 'approve', 'reject'])->default('pending');
            $table->smallInteger('approved_by');
            $table->dateTime('valid_until');
            $table->softDeletes();
            $table->timestamps();

            //always create for renew subscription and creation_dateTime will be approve_dateTime
            //when create-> created_at and updated_at time will be same
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
