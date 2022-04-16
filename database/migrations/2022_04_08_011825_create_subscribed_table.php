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
        Schema::create('subscribed', function (Blueprint $table) {
            $table->bigInteger('id_suscriber');
            $table->foreign('id_suscriber')->references('id')->on('suscribers');
            $table->string('ISBN');
            $table->foreign('ISBN')->references('ISBN')->on('books');
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
        Schema::dropIfExists('subscribed');
    }
};
