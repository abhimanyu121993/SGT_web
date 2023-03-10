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
        Schema::create('parking_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->comment('Id of Property table');
            $table->unsignedBigInteger('guard_id')->comment('Id of SecurityGuard table');
            $table->string('title')->comment('title of report');
            $table->string('vehical_type')->comment('vehical type');
            $table->string('model')->comment('vehical model');
            $table->string('color')->comment('vehical color');
            $table->string('license_no')->comment('License number');
            $table->unsignedBigInteger('state')->comment('Id of state');
            $table->boolean('towed')->comment('Towed status yes or no');
            $table->string('record_sample')->nullable()->comment('Record related file');
            $table->unsignedBigInteger('status_id')->comment('Id of status table');
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
        Schema::dropIfExists('parking_reports');
    }
};
