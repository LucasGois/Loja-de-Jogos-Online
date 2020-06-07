<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlataformaProduto extends Model
{
	use SoftDeletes;
	
    protected $table = "plataformas_produtos";
    protected $primaryKey = "id";
}
