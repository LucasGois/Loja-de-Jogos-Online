@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8"></div>

            <div class="col-md-4">

                <div class="card mt-3">
                    <div class="card-header"><h2><b>Menu</b></h2></div>

                    <div class="card-body">

                        <!-- Produtos -->
                        <div class="col col-md-12 text-right">
                            <a href="{{ route('produto_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Loja</a>
                        </div>

                        @guest
                        @else
                            <!-- Endereco 
                            <div class="col col-md-12 text-right">
                                <a href="{{ route('endereco_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Endereços</a>
                            </div>-->

                            <!-- Historico -->
                            <div class="col col-md-12 text-right">
                                <a href="{{ route('historico_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Suas Compras</a>
                            </div>
                        @endguest

                        @if ($admin ?? false)

                            <!-- Cidades -->
                            <div class="col col-md-12 text-right">
                                <a href="{{ route('cidade_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Cidades</a>
                            </div>

                            <!-- Categorias -->
                            <div class="col col-md-12 text-right">
                                <a href="{{ route('categoria_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Categorias</a>
                            </div>

                            <!-- Plataforma -->
                            <div class="col col-md-12 text-right">
                                <a href="{{ route('plataforma_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Plataforma</a>
                            </div>

                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
