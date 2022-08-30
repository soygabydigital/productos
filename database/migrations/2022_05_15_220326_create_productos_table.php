<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) { 
            $table->id(); 
            $table->string('nombre_prod',30); 
            $table->string('codigo_prod',6)->unique(); 
            $table->string('genero',10);
            $table->decimal('precio_prod',8,2); 
            $table->decimal('stock_prod',8,2); 

            $table->foreignId('categoria_id')
            ->nullable()
            ->constrained('categorias')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 
          
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}