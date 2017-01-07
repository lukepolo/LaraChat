<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id');
            $table->tinyInteger('private');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index(['name', 'private']);
        });

        Schema::create('channel_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('channel_id');
            $table->index(['user_id', 'channel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('channels');
        Schema::dropIfExists('channel_user');
    }
}
