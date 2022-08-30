<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialsTable extends Migration
{

    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('producto_id')         
            ->constrained('productos')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('proveedor_id')         
            ->constrained('proveedors')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
 
            $table->foreignId('cliente_id')         
            ->constrained('clientes')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
           
            $table->date('fecha');
            $table->string('referencia', 10)->unique();
            $table->string('cantidad', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historials');
    }
}
