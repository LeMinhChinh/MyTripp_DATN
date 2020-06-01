<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_rp');
            $table->integer('name');
            $table->string('image',2000);
            $table->integer('price');
            $table->integer('discount');
            $table->integer('child');
            $table->integer('adult');
            $table->integer('type_bed')->nullable();
            $table->integer('quantity_bed');
            $table->integer('description_bed');
            $table->tinyInteger('wifi');
            $table->tinyInteger('smoke');
            $table->tinyInteger('phone');
            $table->tinyInteger('television');
            $table->tinyInteger('air_conditioning');
            $table->integer('acreage')->nullable();
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
