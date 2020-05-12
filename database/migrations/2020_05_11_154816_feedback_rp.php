<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeedbackRp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_rp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_acc');
            $table->bigInteger('id_rp');
            $table->string('content',1000);
            $table->integer('emotion')->nullable;
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
