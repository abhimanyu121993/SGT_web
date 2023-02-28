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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->commet('Id of Property');
            $table->string('name')->nullable()->comment('shift name');
            $table->time('start_time')->nullable()->comment('shift starting time');
            $table->time('end_time')->nullable()->comment('shift ending time');
            $table->boolean('is_active')->default(1)->comment('Activate and deactivate shift');
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
        Schema::dropIfExists('shifts');
    }
};
