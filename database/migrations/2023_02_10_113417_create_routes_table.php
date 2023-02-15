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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->comment('Id of Property table');
            $table->string('name')->comment('route name');
            $table->string('file')->comment('route image ');
            $table->string('color')->comment('route color ');
            $table->longText('desc')->comment('route description ');
            $table->integer('complition_time')->comment('timing in minute ');
            $table->boolean('is_active')->default(1)->comment('Root active in default');
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
        Schema::dropIfExists('routes');
    }
};
