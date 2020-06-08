<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
	use SoftDeletes;
	
    protected $table = "clientes";
    protected $primaryKey = "id";

    public function vendas(){
        return $this->hasMany('App\Venda', 'id_cliente', 'id');
    }

    public function enderecos(){
        return $this->hasMany('App\Endereco', 'id_cliente', 'id');
    }
}