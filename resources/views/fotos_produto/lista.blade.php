@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">

                        <div class="col">
                            <h2><b>Fotos</b> de <b>{{$produto->nome}}</b></h2>
                        </div>

                        <div class="col col-md-2 text-right">
                            <a href="{{ route('fotos_produto_cadastro', $produto->id) }}" class="btn btn-success">Adicionar</a>
                        </div>

                    </div>
                </div>

                <div class="card-body">                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Imagem</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fotos as $foto)
                                <tr>
                                    <th class="text-center">{{ $foto->id }}</td>
                                    <td class="text-center"><img src="{{asset($foto->nome)}}" width="100"></td>
                                    <td class="text-center">
                                       <a class="btn btn-sm btn-danger" href="#" onclick="exclui({{$produto->id}}, {{$foto->id}})">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('produto_cadastro', $produto->id) }}" class="btn btn-primary">Voltar</a>

                </div>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function exclui(id_produto, id_foto){
        if (confirm("Deseja excluir a foto de id: " + id_foto + "?")){
            location.href = "/fotos_produto/excluir/" + id_produto + "/" + id_foto;
        }
    }
</script>

@endsection