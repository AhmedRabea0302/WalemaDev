<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chefs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->string('password_conf');
            $table->string('email');
            $table->string('image_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('kitchen_type')->nullable();
            $table->string('kitchen_govern')->nullable();
            $table->string('min_order')->nullable();
            $table->string('address')->nullable();
            $table->string('street')->nullable();
            $table->boolean('status')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('chefs');
    }
}
