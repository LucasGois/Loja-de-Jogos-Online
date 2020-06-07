<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    use SoftDeletes;
    
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