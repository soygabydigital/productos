<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorsTable extends Migration
{
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('dni_proveedor',10)->unique();
            $table->string('nombre_proveedor',30); 
            $table->string('direccion_proveedor',50); 
            $table->string('telefono_proveedor',20)->unique(); 
            $table->string('correo_proveedor',50)->unique(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
