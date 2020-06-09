<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Endereco;
use App\Cidade;
use Auth;


class EnderecoController extends Controller
{
    
    public function lista(Request $req) {
        $id_cliente = (DB::table('clientes')->where('id_user', Auth::user()->id)->first())->id;
        $enderecos = new Endereco();

        $ordem = $req->query('ordem', 'id');
        $busca = $req->query('busca', '');

        $enderecos = $enderecos->orderBy($ordem, 'asc');
        $enderecos = $enderecos->where($ordem, 'LIKE', "%$busca%");
        $enderecos = $enderecos->where('id_cliente', '=', $id_cliente);

        $vetor_parametros = [];
        $vetor_parametros['ordem'] = $ordem;
        $vetor_parametros['busca'] = $busca;

        $enderecos = $enderecos->paginate($this->pag_size)->appends($vetor_parametros);

        return view('endereco.lista', [
            'enderecos' => $enderecos,
            'ordem' => $ordem,
            'busca' => $busca
        ]);
    }

    public function cadastro($id = 0) {

        if($id > 0){
            // Alterar
            $endereco = Endereco::find($id);
        } else {
            // Adicionar
            $endereco = new Endereco();
        }

        $cidades = Cidade::all();
        
        return view('endereco.cadastro', [
            'endereco' => $endereco,
            'cidades'=>$cidades
        ]);
    }

    public function salvar(Request $req, $id = 0) {

        $req->validate([
            'descricao' => 'required|min:15|unique:enderecos,descricao'
        ]);

        if($id > 0){
            $endereco = Endereco::find($id);
        } else {
            $endereco = new Endereco();
        }
        
        $id_cidade = $req->input('id_cidade');
        $id_cliente = (DB::table('clientes')->where('id_user', Auth::user()->id)->first())->id;

        $endereco->id_cliente = $id_cliente;
        $endereco->id_cidade = $id_cidade;
        $endereco->descricao = $req->input('descricao');
        $endereco->logradouro = $req->input('logradouro');
        $endereco->numero = $req->input('numero');
        $endereco->bairro = $req->input('bairro');

        $endereco->save();

        return redirect()->route('endereco_lista');
    }

    public function excluir($id){
        $endereco = Endereco::find($id);
        $endereco->delete();
        return redirect()->route('endereco_lista');
    }
}
