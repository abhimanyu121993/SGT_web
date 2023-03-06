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
        Schema::create('time_zones', function (Blueprint $table) {
            $table->id();
            $table->string('country_code')->nullable();
            $table->string('timezone')->nullable();
            $table->float('gmt_offset')->nullable();
            $table->float('dst_offset')->nullable();
            $table->float('raw_offset')->nullable();
            $table->boolean('is_active')->default(True);
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
        Schema::dropIfExists('time_zones');
    }
};
