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
        // if (!Schema::hasTable('addresses')) {
        //     Schema::create('addresses', function (Blueprint $table) {
        //         $table->id('address_id');
        //         $table->foreign('uid')->references('user_id')->on('users');
        //         $table->string('country');
        //         $table->timestamps();
        //     });
        // }
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('uid')->unsigned();
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('user_id')->on('users');
            $table->string('country');
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
        Schema::dropIfExists('addresses');
    }
};
