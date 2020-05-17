<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = "enderecos";
    protected $primaryKey = "id";

    public function vendas(){
        return $this->hasMany('App\Venda', 'id_endereco', 'id');
    }
}
