<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venda;
use App\User;
Use App\Cliente;


class DashboardController extends Controller {
	function dashboard(){
        $vendas_hora = Venda::selectRaw('HOUR(created_at) as hora, ROUND(AVG(total), 2) as media')->groupByRaw('HOUR(created_at)')->orderByRaw('1 ASC')->get();

        $vendas_mes = Venda::selectRaw('MONTH(created_at) as mes, COUNT(id) as quantidade')->groupByRaw('MONTH(created_at)')->orderByRaw('1 DESC')->get();

        return view('dashboard.dashboard', ['vendas_hora' => $vendas_hora, 'vendas_mes' => $vendas_mes]);
    }
}