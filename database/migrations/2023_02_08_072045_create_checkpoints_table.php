<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkpoints', function (Blueprint $table) {
            $table->id();
            $table->unsignedbiginteger('owner_id')->comment('id from customer table which is actual owner');
            $table->unsignedbiginteger('property_id')->comment('id from property table');
            $table->text('checkpoint_id')->unique();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('file')->nullable();
            $table->string('longitude');
            $table->string('lattitude');
            $table->string('color')->nullable();
            $table->string('task_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('created_by')->comment('id from customer table which created this');
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
        Schema::dropIfExists('checkpoints');
    }
};
