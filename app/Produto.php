<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";
    protected $primaryKey = "id";

    public function categorias() {
        return $this->belongsToMany('App\Categoria', 'categorias_produtos', 'id_produto', 'id_categoria')->withTimestamps();
    }

    public function fotos(){
        return $this->hasMany('App\FotoProduto', 'id_produto', 'id');
    }
}
