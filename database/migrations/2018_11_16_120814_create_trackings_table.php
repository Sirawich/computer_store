<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('product');
            $table->text('detail');
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('user_id');
            $table->dateTime('complete_at')->nullable();;
            $table->dateTime('receive_at')->nullable();;
            $table->timestamps();
            $table->text('note');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackings');
    }
}
