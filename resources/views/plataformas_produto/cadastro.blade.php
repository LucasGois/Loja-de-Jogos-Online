@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
            
                <div class="card-header">
                    <h2>Cadastro de <b>Plataformas</b> de <b>{{$produto->nome}}</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('plataformas_produto_salvar', $produto->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <select class="custom-select" name="id_plataforma">
                                    @foreach($plataformas as $plataforma)
                                        <option value="{{ $plataforma->id }}">{{ $plataforma->id }} {{ $plataforma->nome }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    </form>

                    <a href="{{ route('plataformas_produto_lista', $produto->id) }}" class="btn btn-primary">Voltar</a>

                </div>
            
            </div>

        </div>
    </div>
</div>
@endsection