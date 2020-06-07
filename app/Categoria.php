<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
	use SoftDeletes;
	
    protected $table = "categorias";
    protected $primaryKey = "id";

    public function produtos(){
        return $this->belongsToMany('App\Produto', 'categorias_produtos', 'id_categoria', 'id_Produto')->withTimestamps();
    }
}