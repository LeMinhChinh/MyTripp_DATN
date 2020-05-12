<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Account extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',100);
            $table->string('password',100);
            $table->string('username',100)->nullable();
            $table->string('name',100);
            $table->string('surname',100);
            $table->string('address',100)->nullable();
            $table->date('age')->nullable();
            $table->string('phone',100)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('avatar',1000)->nullable();
            $table->tinyInteger('role');
            $table->tinyInteger('status');
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
