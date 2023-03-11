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
        Schema::create('route_has_checkpoints', function (Blueprint $table) {
            $table->unsignedbigInteger('route_id');
            $table->unsignedbigInteger('checkpoint_id');
            $table->time('max_time')->nullable();
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('checkpoint_id')->references('id')->on('checkpoints')->onDelete('cascade');
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
        Schema::dropIfExists('route_has_checkpoints');
    }
};
