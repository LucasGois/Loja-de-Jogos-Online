<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriasProdutos extends Model
{
	use SoftDeletes;
	
    protected $table = "categorias_produtos";
    protected $primaryKey = "id";
}