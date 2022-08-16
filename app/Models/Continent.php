<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //tabla a conectar a este modelo
    protected $table="continents";
    //clave primaria de la tabla 
    protected $primaryKey="continent_id";
    //omitir campos de autoridad
    public $timestamps=false;


    use HasFactory;
    
    //Relacion entre continentes y region
    public function regiones(){
        //hasmany parametros:
        //1. modelo a relacionar
        //2. la fk del modelo actual en el modelo a relacionar 
        return $this->hasMany(Region::class ,
                                'continent_id');
    }

    //relacion entre continentes y su paises
    //donde el abuelo es el continent, 
    //El papá es la region  
    //El nieto son los countries

    public function paises(){
        //hasManyThrough Parametros
        //1. Modelo nieto
        //2. Modelo papá
        //3. FK del Abuelo en el papá
        //4. Fk del papá en el nieto
        return $this->hasManyThrough(Country::class,
                                     Region::class,
                                     'continent_id',
                                     'region_id');

        
    }

    public function Country(){
        return $this->belongsTo(Country::class, 'continent_id');
    }
}
