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
            $table->unsignedbiginteger('created_by');
            $table->string('title');
            $table->string('currency');
            $table->decimal('price',10,2)->default(0.00);
            $table->string('days')->default('0');
            $table->integer('free_trial_days')->default('0');
            $table->unsignedbiginteger('status_id');
            $table->boolean('limit')->default(false);
            $table->boolean('life_time')->default(false);
            $table->string('icon')->nullable();
            $table->string('img')->nullable();
            $table->string('color')->nullable();
            $table->string('bg_color')->nullable();
            $table->longText('desc')->nullable();
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
