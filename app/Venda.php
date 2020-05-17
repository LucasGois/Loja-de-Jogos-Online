<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = "vendas";
    protected $primaryKey = "id";

    public function cliente(){
        return $this->belongsTo('App\Cliente', 'id_cliente', 'id');
    }

    public function endereco(){
        return $this->belongsTo('App\Endereco', 'id_endereco', 'id');
    }
    
    public function produtos(){
        return $this->belongsToMany('App\Produto', 'produtos_vendas', 'id_venda', 'id_Produto')->withTimestamps();
    }
}