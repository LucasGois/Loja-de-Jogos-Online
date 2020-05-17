<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoVenda extends Model
{
    protected $table = "produtos_vendas";
    protected $primaryKey = "id";
}