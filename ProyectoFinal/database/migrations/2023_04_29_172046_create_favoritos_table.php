<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->string('idProducto');
            $table->string('idUsuario');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('favoritos');
    }
};
