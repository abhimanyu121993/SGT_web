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
        Schema::create('customer_subscribe_packs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->comment('User id from customer table');
            $table->unsignedBigInteger('subscribe_id')->comment('id from subscription table');
            $table->timestamp('taken')->comment('subscription taken date');
            $table->timestamp('start')->nullable()->comment('subscription start date');
            $table->timestamp('expiry')->nullable()->comment('subscription expiry date');
            $table->double('amount',10, 2)->comment('subscription amount');
            $table->unsignedBigInteger('currency_id')->comment('id from the currency table');
            $table->boolean('is_active')->default(true)->comment('status of customer subscription');
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
        Schema::dropIfExists('customer_subscribe_packs');
    }
};
