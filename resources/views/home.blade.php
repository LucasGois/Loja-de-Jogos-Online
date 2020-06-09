@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <b><h2>Menu</h2></b>
                        </button>
                      </h2>
                    </div>

                    <!-- Produtos -->
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> 
                        <a href="{{ route('produto_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Produtos</a>   
                    </div>

                    @if ($admin ?? false)

                    <!-- Cidades -->
                    <div class="accordion" id="accordionExample"> 
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> 
                            <a href="{{ route('cidade_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Cidades</a>   
                    </div>

                    <!-- Endereços -->
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> 
                        <a href="{{ route('endereco_lista') }}" class="btn btn-outline-secondary btn-lg btn-block">Endereços</a>   
                    </div>

                    <!-- Categorias -->
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> 
                            <a href="{{ route('categoria_lista') }}" class="btn btn-outline-secondary btn-lg btn-block ">Categorias</a>    
                        </div>
                    </div>
                </div>
                    @endif
            </div>
         </div>
    </div>
        
@endsection
