@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
            
                <div class="card-header">
                    <h2>Cadastro de <b>Fotos</b> de <b>{{$produto->nome}}</b></h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('fotos_produto_salvar', $produto->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">Nome</label>

                            <div class="col-md-6">
                                <input id="upload" type="file" class="form-control-secundary @error('upload') is-invalid @enderror" name="upload">
                            </div>
                        </div>

                        <div class="form-group row">
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