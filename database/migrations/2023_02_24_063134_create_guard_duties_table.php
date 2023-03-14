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
        Schema::create('guard_duties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->commet('Id of Property');
            $table->unsignedBigInteger('route_id')->commet('Id of Route');
            $table->unsignedBigInteger('guard_id')->commet('Id of Security Guard');
            $table->unsignedBigInteger('shift_id')->commet('Id of Shifts');
            $table->date('duty_date')->nullable()->comment('Guard working dates');
            $table->unsignedBigInteger('status_id')->nullable();
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
        Schema::dropIfExists('guard_duties');
    }
};
