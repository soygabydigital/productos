<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{ 

    protected $fillable=[
        'dni_cliente', 'nombre_cliente', 'direccion_cliente', 
        'telefono_cliente', 'correo_cliente'
    ];
    
    public function Historials(){ 
        return $this->hasMany(Historial::class);         
    } 
} 

