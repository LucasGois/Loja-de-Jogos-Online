@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
            
                <div class="card-header">
                    <h2>Cadastro de <b>Produtos</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('produto_salvar', $produto->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome', $produto->nome) }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição</label>

                            <div class="col-md-6">
                                <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao', $produto->descricao) }}" required autocomplete="descricao" autofocus>

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estoque" class="col-md-4 col-form-label text-md-right">Estoque</label>

                            <div class="col-md-6">
                                <input id="estoque" type="text" class="form-control @error('estoque') is-invalid @enderror" name="estoque" value="{{ old('estoque', $produto->estoque) }}" required autocomplete="estoque" autofocus>

                                @error('estoque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="valor" class="col-md-4 col-form-label text-md-right">Valor</label>

                            <div class="col-md-6">
                                <input id="valor" type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor', $produto->valor) }}" required autocomplete="valor" autofocus>

                                @error('valor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            
                            <div class="col-3"></div>

                            <div class="col text-center">
                                <a href="{{ route('fotos_produto_lista', $produto->id) }}" class="btn btn-sm btn-primary">
                                    <h5>Imagens</h5>
                                </a>
                            </div>

                            <div class="col text-center">
                                <a href="{{ route('categorias_produto_lista', $produto->id) }}" class="btn btn-sm btn-primary">
                                    <h5>Categorias</h5>
                                </a>
                            </div>

                            <div class="col text-center">
                                <a href="{{ route('plataformas_produto_lista', $produto->id) }}" class="btn btn-sm btn-primary">
                                    <h5>Plataformas</h5>
                                </a>
                            </div>

                            <div class="col-3"></div>

                        </div>

                        <!-- Imagem 
                        <div class="form-group row ">
                            <label for="upload" class="col-md-4 col-form-label text-md-right">Imagem</label>
                            <div class="col-md-6 "> 
                                <input id="upload" type="file" class="form-control-secundary @error('upload') is-invalid @enderror" name="upload">

                                @error('upload')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         Imagem -->

                        <div class="form-group row m-5">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>

                    </form>
                </div>
            
            </div>

        </div>
    </div>
</div>
@endsection