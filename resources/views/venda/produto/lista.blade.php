@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2><b>Carrinho</b></h2>
                        </div>
                        
                        <div class="col mt-2">
                            <h4>Total: {{ number_format($total, 2, '.', '') }}</h4>
                        </div>                    
                        
                        <div class="col col-md-2 text-right">
                            <a href="{{ route('venda_limpar') }}" class="btn btn-danger">Limpar</a>
                        </div>

                    </div>

                    <div class="row">

                    </div>
                </div>
                <div class="card-body">

                    @if (count($produtos) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Imagem</th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Valor</th>
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
                                        <td class="text-center">{{ $produto->nome }}</td>
                                        <td class="text-center">{{ number_format($produto->valor, 2, '.', '') }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary" href="#" onclick="remover( {{ $produto->id }} )">Remover</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <form action="{{ route('venda_salvar') }}" method="post">
                            @csrf
                            <div class="row">

                                <div class="col">
                                    <a href="{{ route('produto_lista') }}" class="btn btn-primary">Add Produtos</a>
                                </div>

                                <div class="col">
                                    <label for="descricao" class="col col-form-label text-md-right">Endereço:</label>
                                </div>

                                <div class="col-4">
                                    <select class="custom-select" name="id_endereco">
                                        @foreach($enderecos as $endereco)
                                            <option value="{{ $endereco->id }}">
                                            {{
                                                $endereco->id . ' - ' .
                                                $endereco->cidade->nome . ', ' .
                                                $endereco->bairro . ', ' .
                                                $endereco->logradouro . ', ' .
                                                $endereco->numero
                                            }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col text-right">
                                    <input type="hidden" name="total" value="{{ $total }}">
                                    <input type="submit" class="btn btn-success" value="Finalizar">
                                </div>

                            </div>
                        </form>
                    @else
                        <a href="{{ route('produto_lista') }}" class="btn btn-primary">Add Produtos</a>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>

<script>

	function remover(id){
		if (confirm("Deseja remover o produto de id: " + id + "?")){
			location.href = "/venda/remover/" + id;
		}
	}

</script>

@endsection