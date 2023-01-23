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
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('admin_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender', ['M', 'F', 'O'])->default('M');
            $table->string('email')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('pic')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('timezone')->nullable();
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
        Schema::dropIfExists('admin_profiles');
    }
};
