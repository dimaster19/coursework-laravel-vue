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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 10, 2);
            $table->integer('count');
            $table->string('desc');
            $table->string('mainimg');
            $table->string('imgs');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('manufacture_id');

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('manufacture_id')->references('id')->on('manufactures');

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
        Schema::dropIfExists('products');
    }
};
