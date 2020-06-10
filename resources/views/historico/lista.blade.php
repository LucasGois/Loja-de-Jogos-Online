@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h2><b>Histórico</b></h2>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>

                <div class="card-body">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Endereço</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendas as $venda)
                                <tr>
                                    <th class="text-center">{{ $venda->id }}</td>
                                    <td class="text-center">{{ $venda->endereco->descricao }}</td>
                                    <td class="text-center">{{ number_format($venda->total, 2, '.', '') }}</td>
                                    <td class="text-center">{{ date("d/m/Y", strtotime("$venda->created_at")) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('historico_detalhes', $venda->id) }}" class="btn btn-sm btn-primary">Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $vendas->links() }}

                </div>

            </div>

        </div>
    </div>
</div>
@endsection