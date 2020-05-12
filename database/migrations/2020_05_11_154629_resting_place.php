<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RestingPlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resting_places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_acc');
            $table->integer('type');
            $table->integer('place');
            $table->string('name',100);
            $table->string('address',100);
            $table->string('email',100);
            $table->string('phone',100);
            $table->string('image',2000)->nullable();
            $table->tinyInteger('rate');
            $table->tinyInteger('wifi');
            $table->tinyInteger('pool');
            $table->tinyInteger('parking');
            $table->tinyInteger('smoke');
            $table->tinyInteger('animal');
            $table->integer('age');
            $table->integer('checkin');
            $table->integer('checkout');
            $table->tinyInteger('status');
            $table->string('description',1000)->nullable();
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
        //
    }
}
