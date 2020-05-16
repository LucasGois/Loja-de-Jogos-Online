<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    protected $table = "plataformas";
    protected $primaryKey = "id";

    public function produtos(){
        return $this->belongsToMany('App\Produto', 'plataformas_produtos', 'id_plataforma', 'id_Produto')->withTimestamps();
    }
}