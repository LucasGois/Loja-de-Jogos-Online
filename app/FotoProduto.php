<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoProduto extends Model
{
    protected $table = "fotos_produto";
    protected $primaryKey = "id";

    public function produto(){
        return $this->belongsTo('App\Produto', 'id_produto', 'id');
    }
}