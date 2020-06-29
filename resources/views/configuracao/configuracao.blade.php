@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    <h2>Configuração de <b>Integração</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('configuracao_integracao_salvar', $integracao->id) }}">
                        @csrf

                        <!-- Nome -->
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Nome</label>

                            <div class="col-md">
                                <input id="name" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $integracao->nome) }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Nome -->

                        <!-- URL -->
                        <div class="form-group row">
                            <label for="url" class="col-md-2 col-form-label text-md-right">URL</label>

                            <div class="col-md">
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url', $integracao->url) }}" required autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- URL -->

                        <!-- Token -->
                        <div class="form-group row">
                            <label for="token" class="col-md-2 col-form-label text-md-right">Token</label>

                            <div class="col-md">
                                <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token" value="{{ old('token', $integracao->token) }}" required autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Token -->

                        <!-- Botao Submit -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                        <!-- Botao Submit -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection