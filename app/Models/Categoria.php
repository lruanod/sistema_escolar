<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable =['nombrec'];


    /***  relacion de categoria a muchos productos**/
    public function categorias(){
        return $this->hasMany('App\Models\Producto');
    }
}
