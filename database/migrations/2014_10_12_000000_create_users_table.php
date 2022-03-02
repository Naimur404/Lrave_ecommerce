<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username')->unique();
            $table->string('phone_no')->unique();
            $table->string('email')->unique();

            $table->string('password');
            $table->string('street_address');
            $table->unsignedInteger('division_id')->comment('Division table id');
            $table->unsignedInteger('district_id')->comment('district table');
            $table->unsignedTinyInteger('status')->default(0);
            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();
            $table->text('shipping_address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
