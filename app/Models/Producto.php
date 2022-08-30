<?php

namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 


class Producto extends Model
{  

    protected $table = 'productos';
    protected $fillable=[
        'nombre_prod','codigo_prod','genero','precio_prod','stock_prod','categoria_id'
    ];

    public function categoria(){ 
        return $this->belongsTo(Categoria::class);         
    } 

    public function Historials(){ 
        return $this->hasMany(Historial::class);         
    } 
}

