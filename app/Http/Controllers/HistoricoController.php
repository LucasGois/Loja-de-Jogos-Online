<?php

namespace App\Http\Controllers;

use App\Venda;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{

    public function lista(Request $req) {
        $id_cliente = (DB::table('clientes')->where('id_user', Auth::user()->id)->first())->id;

        $vendas = new Venda();

        $vendas = $vendas->orderBy('id_cliente', 'asc');
        $vendas = $vendas->where('id_cliente', '=', $id_cliente);

        $vendas = $vendas->paginate($this->pag_size);

        return view('historico.lista', [
            'vendas' => $vendas,
        ]);
    }

    public function detalhes($id_venda) {
        $id_cliente = (DB::table('clientes')->where('id_user', Auth::user()->id)->first())->id;
        $venda =  Venda::find($id_venda);

        if ($venda == null) { return redirect()->route('historico_lista'); }

        if($id_cliente != $venda->id_cliente){
            return redirect()->route('historico_lista');
        }

        return view('historico.detalhes', [
            'venda' => $venda,
        ]);
    }

}
