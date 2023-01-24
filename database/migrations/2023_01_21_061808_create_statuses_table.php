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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('name of the status');
            $table->string('icon')->comment('icon of the status');
            $table->string('color')->default('#0000')->comment('text colour of status');
            $table->string('bg_color')->default('#ffff')->comment('background colour of status');
            $table->string('Type')->default('general')->comment('type of the status');
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
        Schema::dropIfExists('statuses');
    }
};
