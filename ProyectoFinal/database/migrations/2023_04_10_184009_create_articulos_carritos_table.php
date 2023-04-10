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
        Schema::create('articulos_carritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idCarrito')->references('id')->on('carritos')->unsigned();
            $table->foreignId('idProducto')->references('id')->on('productos')->unsigned();
            $table->integer('cantidad');
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
        Schema::dropIfExists('articulos_carritos');
    }
};
