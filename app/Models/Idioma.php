<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table ="languages";
    //establecer la tabla primaria de esta tabla 
    protected $primaryKey ="language_id";
    //omitir campos de autoridad
    public $timestamps = false;

    use HasFactory;
    //relacion entre idioma y paises
    public function paises(){
        return $this->belongsToMany(Country::class,
                                'country_languages', 
                                'language_id',
                                'country_id');
    }
}
