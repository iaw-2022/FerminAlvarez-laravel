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
        Schema::create('have', function (Blueprint $table) {
            $table->decimal('price');
            $table->string('ISBN');
            $table->foreign('ISBN')->references('ISBN')->on('books');
            $table->foreignId(Bookshop::class);
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
        Schema::dropIfExists('have');
    }
};
