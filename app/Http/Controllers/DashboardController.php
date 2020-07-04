<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\User;
Use App\Cliente;
use App\ProdutoVenda;
use App\Produto;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller {
	function dashboard(){
        $vendas_hora = Venda::selectRaw('HOUR(created_at) as hora, ROUND(AVG(total), 2) as media')->groupByRaw('HOUR(created_at)')->orderByRaw('1 ASC')->get();

        $vendas_mes = Venda::selectRaw('MONTH(created_at) as mes, COUNT(id) as quantidade')->groupByRaw('MONTH(created_at)')->orderByRaw('1 DESC')->get();

		
		$vendas_por_produto = DB::table('produtos')
			->join('produtos_vendas', 'produtos_vendas.id_produto', '=',  'produtos.id')
            ->selectRaw('produtos.nome as produtos, ROUND(SUM(produtos_vendas.subtotal), 2) as somatorio')
            ->groupBy('produtos')
            ->orderByDesc('somatorio')
            ->limit(5)
            ->get();   
   		
   		$quantidade_clientes = Cliente::selectRaw('COUNT(id) as quantidade, admin')
   			->groupBy('admin')
   			->get();


        return view('dashboard.dashboard', ['vendas_hora' => $vendas_hora, 'vendas_mes' => $vendas_mes, 'vendas_por_produto' => $vendas_por_produto, 'quantidade_clientes' => $quantidade_clientes]);
    }
}