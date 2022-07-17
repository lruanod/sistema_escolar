<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//mensualidad
class Grado extends Model
{
    protected $fillable =['gnombre','gseccion','monto','nivel_id'];

    /***  relacion de grado solo tiene un nivel**/
    public function nivel(){
        return $this->belongsTo('App\Models\Nivel');
    }

    /***  relacion de estudiante a muchos padres**/
    public function grados(){
        return $this->hasMany(
            'App\Models\Asignaciongrado',
            'App\Models\Curso');
    }
}
