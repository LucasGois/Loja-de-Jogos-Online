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
                            <h4><b>Nome: </b>{{ $produto->nome }}</h4>
                        </div>

                        <div class="col">
                            <h4><b>Descrição: </b>{{ $produto->descricao }}</h4>
                        </div>

                        <div class="col">
                            <h4><b>Valor: </b>{{ $produto->valor }}</h4>
                        </div>

                    </div>
                </div>

                <div class="card-body">

                    <div class="card m-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <h2><b>Fotos</b></h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Imagem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produto->fotos as $foto)
                                        <tr>
                                            <th class="text-center">{{ $foto->id }}</td>
                                            <td class="text-center"><img src="{{asset($foto->nome)}}" width="100"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card m-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <h2><b>Plataformas</b></h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produto->plataformas as $plataforma)
                                        <tr>
                                            <th class="text-center">{{ $plataforma->id }}</td>
                                            <td class="text-center">{{ $plataforma->nome }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card m-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <h2><b>Categorias</b></h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produto->categorias as $categoria)
                                        <tr>
                                            <th class="text-center">{{ $categoria->id }}</td>
                                            <td class="text-center">{{ $categoria->nome }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('historico_lista') }}" class="btn btn-primary">Voltar</a>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection