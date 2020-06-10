@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">

                        <div class="col">
                            <h2><b>Plataformas</b> de <b>{{$produto->nome}}</b></h2>
                        </div>

                        <div class="col col-md-2 text-right">
                            <a href="{{ route('plataformas_produto_cadastro', $produto->id) }}" class="btn btn-success">Adicionar</a>
                        </div>

                    </div>
                </div>

                <div class="card-body">                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plataformas as $plataforma)
                                <tr>
                                    <th class="text-center">{{ $plataforma->id }}</td>
                                    <td class="text-center">{{ $plataforma->nome }}</td>
                                    <td class="text-center">
                                       <a class="btn btn-sm btn-danger" href="#" onclick="exclui({{$produto->id}}, {{$plataforma->id}})">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('produto_lista') }}" class="btn btn-primary">Voltar</a>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection