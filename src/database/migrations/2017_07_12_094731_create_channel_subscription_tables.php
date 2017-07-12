<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelSubscriptionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('channels'))
            Schema::create('channels', function (Blueprint $table) {
                $table->string('id_channel', 10);
                $table->primary('id_channel');
            });

        if(!Schema::hasTable('user_channels'))
            Schema::create('user_channels', function (Blueprint $table) {
                $table->integer('id_user');
                $table->string('id_channel', 10);
                $table->primary(['id_user', 'id_channel']);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_channels');
        Schema::dropIfExists('channels');
    }
}
