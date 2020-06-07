<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FotoProduto extends Model
{
	use SoftDeletes;
	
    protected $table = "fotos_produto";
    protected $primaryKey = "id";

    public function produto(){
        return $this->belongsTo('App\Produto', 'id_produto', 'id');
    }
}