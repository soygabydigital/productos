<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{

    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('dni_cliente',10)->unique();
            $table->string('nombre_cliente',30); 
            $table->string('direccion_cliente',50); 
            $table->string('telefono_cliente',20)->unique(); 
            $table->string('correo_cliente',50)->unique(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
