<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditedDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edited_descriptions', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->integer('descriptionable_id');
            $table->string('descriptionable_type');
            $table->integer('editor_id');
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
        Schema::dropIfExists('edited_descriptions');
    }
}
