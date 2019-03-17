<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pick_up')->unsigned();
            $table->string('stopover')->nullable();
            $table->integer('drop_off')->unsigned();
            $table->date('start_date');
            $table->time('start_time');
            $table->integer('seats');
            $table->integer('sub_path1');
            $table->integer('sub_path2');
            $table->integer('path');
            $table->text('detail');
            $table->integer('status')->default(1);
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pick_up')->references('id')->on('locations');
            $table->foreign('drop_off')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
