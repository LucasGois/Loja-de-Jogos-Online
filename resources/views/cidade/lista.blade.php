@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="table-wrapper">

                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-10"><h2>Lista de <b>Cidades</b></h2></div>
                        <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-success">Add</button>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr class="d-flex">
                            <th class="col-1" scope="col">ID</th>
                            <th class="col-5" scope="col">Nome</th>
                            <th class="col-4" scope="col">Estado</th>
                            <th class="col-2" scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cidades as $cidade)
                            <tr class="d-flex">
                                <th class="col-1 align-middle" scope="row">{{ $cidade->id }}</td>
                                <td class="col-5 align-middle">{{ $cidade->nome }}</td>
                                <td class="col-4 align-middle">{{ $cidade->estado }}</td>
                                <td class="col-2 align-middle">
                                    <button type="button" class="align-middle btn btn-sm btn-warning">Alterar</button>
                                    <button type="button" class="align-middle btn btn-sm btn-danger">Excluir</button>
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
@endsection