@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">

                        <div class="col">
                            <h2><b>Categorias</b> de <b>{{$produto->nome}}</b></h2>
                        </div>

                        <div class="col col-md-2 text-right">
                            <a href="{{ route('categoria_cadastro') }}" class="btn btn-success">Adicionar</a>
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
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <th class="text-center">{{ $categoria->id }}</td>
                                    <td class="text-center">{{ $categoria->nome }}</td>
                                    <td class="text-center">
                                       <a class="btn btn-sm btn-danger" href="#" onclick="exclui( {{ $categoria->id }} )">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    function exclui(id){
        if (confirm("Deseja excluir a categoria de id: " + id + "?")){
            location.href = "/categorias_produto/excluir/" + id;
        }
    }
</script>

@endsection