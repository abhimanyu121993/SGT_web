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
        Schema::create('emergency_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->comment('Id of Property table');
            $table->unsignedBigInteger('guard_id')->comment('Id of SecurityGuard table');
            $table->string('title')->comment('title of report');
            $table->timestamp('date_time')->comment('Emergency date and time');
            $table->string('longitude')->nullable();
            $table->string('lattitude')->nullable();
            $table->unsignedBigInteger('checkpoint_id')->comment('Id of checkpoint table');
            $table->longText('emergency_notes')->nullable()->comment('Emergency details');
            $table->json('name')->nullable()->comment('Involved Peoples name');
            $table->json('phone')->nullable()->comment('Involved peoples phone no');
            $table->json('witness_name')->nullable()->comment('Witnesses People name');
            $table->json('witness_phone')->nullable()->comment('Witnesses people phone no');
            $table->longText('action_notes')->nullable()->comment('Action Taker notes details');
            $table->longText('police_report')->nullable()->comment('Police report details');
            $table->string('office_name')->nullable()->comment('Officer name');
            $table->string('office_designation')->nullable()->comment('Officer designation');
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
        Schema::dropIfExists('emergency_reports');
    }
};
