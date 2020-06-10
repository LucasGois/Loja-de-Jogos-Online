@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2>Lista de <b>Produtos</b></h2>
                        </div>
                        
                        <div class="col">
                            <form>
                                <div class="input-group">
                                    <input type="hidden" name="ordem" value="{{ $ordem }}">
                                    <input class="btn btn-primary" type="submit" value="Buscar">
                                    <input class="form-control" type="text" name="busca" autocomplete="off">
                                </div>
                            </form>
                        </div>
                        
                        @if ($admin)
                            <div class="col col-md-2 text-right">
                                <a href="{{ route('produto_cadastro') }}" class="btn btn-success">Adicionar</a>
                            </div>
                        @endif

                    </div>

                    <div class="row">

                    </div>
                </div>
                <div class="card-body">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Imagem</th>
                                <th class="text-center"><a href="?ordem=id&busca={{ $busca }}">ID</a></th>
                                <th class="text-center"><a href="?ordem=nome&busca={{ $busca }}">Nome</a></th>
                                <th class="text-center"><a href="?ordem=valor&busca={{ $busca }}">Valor</a></th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <th class="text-center">
                                        @if (count($produto->fotos) > 0)
                                            <img src="{{asset($produto->fotos[0]->nome)}}" width="100">
                                        @else
                                            <img src="{{''}}">
                                        @endif
                                    </td>
                                    <th class="text-center">{{ $produto->id }}</td>
                                    <td class="text-center"><a href="{{ route('produto_detalhes', $produto->id) }}">{{$produto->nome}}</a></td>
                                    <td class="text-center">{{ number_format($produto->valor, 2, '.', '') }}</td>
                                    @if ($admin)
                                        <td class="text-center">
                                            <a href="{{ route('produto_cadastro', $produto->id) }}" class="btn btn-sm btn-warning">Alterar</a>
                                            <a class="btn btn-sm btn-danger" href="#" onclick="exclui( {{ $produto->id }} )">Excluir</a>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary" href="#" onclick="addCarrinho( {{ $produto->id }} )">Add Carrinho</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $produtos->links() }}

                </div>

            </div>

        </div>
    </div>
</div>

<script>

	function exclui(id){
		if (confirm("Deseja excluir a produto de id: " + id + "?")){
			location.href = "/produto/excluir/" + id;
		}
	}

	function addCarrinho(id){
		if (confirm("Add carrinho: " + id + "?")){
			location.href = "/venda/adicionar/" + id;
		}
	}

</script>

@endsection