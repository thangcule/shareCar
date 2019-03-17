<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('choose_pick_up');
            $table->integer('choose_drop_off');
            $table->integer('walk_pk');
            $table->integer('walk_dr');
            $table->integer('seats');
            $table->integer('price');
            $table->integer('fee');
            $table->integer('status')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('ride_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ride_id')->references('id')->on('rides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
