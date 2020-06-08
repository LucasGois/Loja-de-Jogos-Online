<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
	use SoftDeletes;

    protected $table = "enderecos";
    protected $primaryKey = "id";

    public function cliente(){
        return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    public function vendas(){
        return $this->hasMany('App\Venda', 'id_endereco', 'id');
    }

    public function cidade(){
        return $this->belongsTo('App\Cidade', 'id_cidade', 'id');
    }
}
