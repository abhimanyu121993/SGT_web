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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('property name');
            $table->string('postcode')->nullable()->comment('postcode of the property location');
            $table->string('country')->nullable()->comment('country of the property location');
            $table->string('state')->nullable()->comment('state of the property location');
            $table->string('city')->nullable()->comment('city of the property location');
            $table->text('address')->nullable()->comment('address of the property');
            $table->string('lattitude')->nullable()->comment('lattitude value of property');
            $table->string('longitude')->nullable()->comment('longitude value of property');
            $table->string('created_by')->nullable()->comment('User id from the customer table');
            $table->string('owner_id')->nullable()->comment('Owner id of property');
            $table->string('file')->nullable();
            $table->json('property_pics')->nullable()->comment('property multiple images');
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
        Schema::dropIfExists('properties');
    }
};
