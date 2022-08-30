<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{  

    protected $fillable=[
        'producto_id', 'proveedor_id', 'cliente_id', 'fecha', 'referencia', 'cantidad'
    ];

    public function Producto(){ 
        return $this->belongsTo(Producto::class);         
    } 
    public function Proveedor(){ 
        return $this->belongsTo(Proveedor::class);         
    } 
    public function Cliente(){ 
        return $this->belongsTo(Cliente::class);         
    } 
} 
 