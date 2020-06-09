@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        
                        <div class="col-12 col-md-5">
                            <h2><b>Detalhes</b></h2>
                        </div>

                    </div>

                    <div class="row text-center">

                        <div class="col">
                            <h4><b>Cliente: </b>{{ $venda->cliente->user->name }}</h4>
                        </div>

                        <div class="col">
                            <h4><b>Total: </b>{{ number_format($venda->total, 2, '.', '') }}</h4>
                        </div>

                        <div class="col">
                            <h4><b>Data: </b>{{ date("d/m/Y", strtotime("$venda->created_at")) }}</h4>
                        </div>

                    </div>
                </div>

                <div class="card-body">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Imagem</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venda->produtos as $produto)
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection