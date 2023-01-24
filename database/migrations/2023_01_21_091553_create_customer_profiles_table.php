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
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->comment('id from customer table');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->enum('gender', ['M', 'F', 'O'])->default('M');
            $table->string('dob')->nullable();
            $table->string('mobileno')->nullable();
            $table->unsignedBigInteger('city_id')->comment('id from city table');
            $table->text('address')->nullable();
            $table->string('pic')->nullable();
            $table->string('company_name')->nullable()->comment('company name of the owner');
            $table->string('federal_ein')->nullable()->comment('federal_ein of the company');
            $table->string('bsis_number')->nullable()->comment('bsis number of the company');
            $table->unsignedBigInteger('status')->default(true)->comment('status of customer: active/inactive');
            $table->unsignedBigInteger('time_zone_id')->comment('id from the timezone table');
            $table->unsignedBigInteger('currency_id')->comment('id from the currency table');
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
        Schema::dropIfExists('customer_profiles');
    }
};
