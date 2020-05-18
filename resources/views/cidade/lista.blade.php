@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h2>
                            Lista de <b>Cidades</b>
                        </h2>
                    </div>
                    <div class="col-2 text-right">
                        <button type="button" class="btn btn-success">Add</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
            
                <table class="table">
                    <thead>
                        <tr class="row">
                            <th class="text-center col-sm-2 col-md-1">ID</th>
                            <th class="text-center col-sm-5 col-md-6">Nome</th>
                            <th class="text-center col-sm-3 col-md-3">Estado</th>
                            <th class="text-center col-sm-2 col-md-2" >Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cidades as $cidade)
                            <tr class="row">
                                <th class="text-center col-sm-2 col-md-1">{{ $cidade->id }}</td>
                                <td class="text-center col-sm-5 col-md-6">{{ $cidade->nome }}</td>
                                <td class="text-center col-sm-3 col-md-3">{{ $cidade->estado }}</td>
                                <td class="text-center col-sm-2 col-md-2">
                                    <button type="button" class="btn btn-sm btn-warning">Alterar</button>
                                    <button type="button" class="btn btn-sm btn-danger">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {{ $cidades->links() }}

            </div>

            </div>

        </div>
    </div>
</div>
@endsection