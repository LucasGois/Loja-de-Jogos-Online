@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
            
                <div class="card-header">
                    <h2>Cadastro de <b>Plataforma</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('plataforma_salvar', $plataforma->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $plataforma->nome) }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    </form>

                    <a href="{{ route('plataforma_lista') }}" class="btn btn-primary">Voltar</a>

                </div>
            
            </div>

        </div>
    </div>
</div>
@endsection