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
        Schema::create('books', function (Blueprint $table) {
            $table->string('ISBN')->primary();
            $table->string('name');
            $table->string('publisher')->nullable();;
            $table->tinyInteger('total_pages')->nullable();;
            $table->date('published_at')->nullable();
            $table->string('category')->nullable();;
            $table->string('image_link')->nullable();;
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
        Schema::dropIfExists('books');
    }
};
