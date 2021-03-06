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
        Schema::create('has', function (Blueprint $table) {
            $table->decimal('price')->nullable();
            $table->string('ISBN');
            $table->foreign('ISBN')->references('ISBN')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('Bookshop');
            $table->foreign('Bookshop')->references('id')->on('bookshops')->onDelete('cascade')->onUpdate('cascade');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('has');
    }
};
