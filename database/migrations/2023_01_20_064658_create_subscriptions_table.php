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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('title of the subscription');
            $table->string('currency')->comment('id from the currency table');
            $table->decimal('price',10,2)->default(0.0)->comment('subscription price');
            $table->string('days')->default('0')->comment('Validity of subscription in days');
            $table->integer('free_trial_days')->default('0')->comment('Number of days for free trial');
            $table->boolean('is_active')->default(true)->comment('status of subscription');
            $table->unsignedbiginteger('status_id')->nullable()->comment('status of subscription');
            $table->boolean('limit')->default(false)->comment('validation of limitation if exist');
            $table->boolean('life_time')->default(false)->comment('Is this subscription for lifetime ?');
            $table->boolean('chat')->default(false)->comment('validation of chat if exist');
            $table->string('icon')->nullable()->comment('icon of the subscription');
            $table->string('img')->nullable()->comment('image of the subscription');
            $table->string('color')->nullable()->comment('text colour of the subscription');
            $table->string('bg_color')->nullable()->comment('background colour of the subscription');
            $table->bigInteger('guard_qty')->default('1')->comment('Max Guard quantity');
            $table->bigInteger('property_qty')->default('1')->comment('Max Property quantity');
            $table->bigInteger('shift_qty')->default('1')->comment('Max Shift quantity');
            $table->bigInteger('checkpoint_qty')->default('1')->comment('Max Check-Point quantity');
            $table->longText('desc')->nullable()->comment('description of the subscription');
            $table->unsignedbiginteger('created_by')->comment('id from admin table');
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
        Schema::dropIfExists('subscriptions');
    }
};
