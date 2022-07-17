<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    protected $fillable =['pnombre','pdireccion','pcel','pcui','ppariente','pcorreo','ppass','pusuario', 'purl'];

    /***  relacion de estudiante a muchos padres**/
    public function padres(){
        return $this->hasMany('App\Models\Padreestudiante');
    }

}

