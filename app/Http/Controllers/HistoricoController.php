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

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $vendas = $vendas->orderBy($ordem, 'asc');
        $vendas = $vendas->where($ordem, 'LIKE', "%$busca%");
        $vendas = $vendas->where('id_cliente', '=', $id_cliente);

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $vendas = $vendas->paginate($this->pag_size)->appends($vetor_parametros);

        return view('historico.lista', [
            'vendas' => $vendas,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function detalhes($id_venda) {
        $id_cliente = (DB::table('clientes')->where('id_user', Auth::user()->id)->first())->id;
        $venda =  Venda::find($id_venda);

        if($id_cliente != $venda->id_cliente){
            return redirect()->route('historico_lista');
        }

        return view('historico.detalhes', [
            'venda' => $venda,
        ]);
    }

}
