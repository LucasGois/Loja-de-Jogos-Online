@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Status de Login</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Você está logado!!
                </div>
            </div>

            @if ($admin)
            <div class="card mt-3">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <div class="col col-md-12 text-right">
                                <a href="{{ route('produto_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Produtos</a>
                    </div>
                    <div class="col col-md-12 text-right">
                                <a href="{{ route('cidade_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Cidades</a>
                    </div>
                    <div class="col col-md-12 text-right">
                                <a href="{{ route('endereco_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Endereços</a>
                    </div>
                    <div class="col col-md-12 text-right">
                                <a href="{{ route('categoria_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Categorias</a>
                    </div>

                </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
