<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = "cidades";
    protected $primaryKey = "id";

    public function endereco(){
        return $this->hasMany('App\Endereco', 'id_cidade', 'id');
    }
}

