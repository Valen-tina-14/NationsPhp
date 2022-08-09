<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table ="regions";
    //establecer la tabla primaria de esta tabla 
    protected $primaryKey ="region_id";
    //omitir campos de autoridad
    public $timestamps = false;

    use HasFactory;
    public function continente(){
        //belonsgto: Parametros
        //1- el modelo a relacionar 
        //2. la fk del modelo a relacionar en el modelo actual
        return $this->belongsTo(Continent::class,
                                    'continent_id');
    }
    //relacionar entre region 1 -m paises
    public function paises(){
        return $this->hasMany(Country::class, 'region_id');
    }

}
