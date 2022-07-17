<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $fillable =['galbum','ndescripcion','gfecha'];
    /***  relacion de estudiante a muchos padres**/

    public function galerias(){
        return $this->hasMany('App\Models\Imagen');
    }
}
