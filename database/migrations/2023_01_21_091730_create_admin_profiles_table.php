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
            $table->string('admin_id')->comment('id from the admin table');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender', ['M', 'F', 'O'])->default('M');
            $table->string('email')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('pic')->nullable();
            $table->string('country')->nullable()->comment('id from country table');
            $table->string('state')->nullable()->comment('id from state table');
            $table->string('city')->nullable()->comment('id from city table');
            $table->string('time_zone_id')->nullable()->comment('id from timezone table');
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
