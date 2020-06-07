<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes; 
    
    protected $table = "produtos";
    protected $primaryKey = "id";

    public function fotos(){
        return $this->hasMany('App\FotoProduto', 'id_produto', 'id');
    }

    public function categorias() {
        return $this->belongsToMany('App\Categoria', 'categorias_produtos', 'id_produto', 'id_categoria')->withTimestamps();
    }

    public function plataformas() {
        return $this->belongsToMany('App\Plataforma', 'plataformas_produtos', 'id_produto', 'id_plataforma')->withTimestamps();
    }

    public function vendas() {
        return $this->belongsToMany('App\Venda', 'produtos_vendas', 'id_produto', 'id_venda')->withTimestamps();
    }
}