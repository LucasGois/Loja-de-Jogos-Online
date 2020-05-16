<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";
    protected $primaryKey = "id";

    public function produtos(){
        return $this->belongsToMany('App\Produto', 'categorias_produtos', 'id_categoria', 'id_Produto')->withTimestamps();
    }
}