<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

    protected $fillable=[
        'dni_proveedor', 'nombre_proveedor', 'direccion_proveedor', 
        'telefono_proveedor', 'correo_proveedor'
    ];

    public function Historials(){ 
        return $this->hasMany(Historial::class);         
    } 
}
  