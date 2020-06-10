<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Home
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

// Produto
Route::get('/produto/lista', 'ProdutoController@lista')->name('produto_lista');

Route::middleware(['auth'])->group(function(){

    // Endereco
    Route::get('/endereco/lista', 'EnderecoController@lista')->name('endereco_lista');
    Route::get('/endereco/cadastro/{id?}', 'EnderecoController@cadastro')->name('endereco_cadastro');
    Route::post('/endereco/salvar/{id?}', 'EnderecoController@salvar')->name('endereco_salvar');
    Route::get('/endereco/excluir/{id}', 'EnderecoController@excluir')->name('endereco_excluir');

    // Venda
    Route::get('/venda/lista', 'VendaController@lista')->name('venda_lista');
    Route::post('/venda/salvar/{id?}', 'VendaController@salvar')->name('venda_salvar');
    // Carrinho
    Route::get('/venda/adicionar/{id_produto}', 'VendaController@adicionar')->name('venda_adicionar');
    Route::get('/venda/remover/{id_produto}', 'VendaController@remover')->name('venda_remover');
    Route::get('/venda/limpar', 'VendaController@limpar')->name('venda_limpar');

    // Historico
    Route::get('/historico/lista', 'HistoricoController@lista')->name('historico_lista');
    Route::get('/historico/detalhes/{id_venda}', 'HistoricoController@detalhes')->name('historico_detalhes');

});

Route::middleware(['admin'])->group(function(){

    // Cidade
    Route::get('/cidade/lista', 'CidadeController@lista')->name('cidade_lista');
    Route::get('/cidade/cadastro/{id?}', 'CidadeController@cadastro')->name('cidade_cadastro');
    Route::post('/cidade/salvar/{id?}', 'CidadeController@salvar')->name('cidade_salvar');
    Route::get('/cidade/excluir/{id}', 'CidadeController@excluir')->name('cidade_excluir');

    // Categoria
    Route::get('/categoria/lista', 'CategoriaController@lista')->name('categoria_lista');
    Route::get('/categoria/cadastro/{id?}', 'CategoriaController@cadastro')->name('categoria_cadastro');
    Route::post('/categoria/salvar/{id?}', 'CategoriaController@salvar')->name('categoria_salvar');
    Route::get('/categoria/excluir/{id}', 'CategoriaController@excluir')->name('categoria_excluir');

    // Plataforma
    Route::get('/plataforma/lista', 'PlataformaController@lista')->name('plataforma_lista');
    Route::get('/plataforma/cadastro/{id?}', 'PlataformaController@cadastro')->name('plataforma_cadastro');
    Route::post('/plataforma/salvar/{id?}', 'PlataformaController@salvar')->name('plataforma_salvar');
    Route::get('/plataforma/excluir/{id}', 'PlataformaController@excluir')->name('plataforma_excluir');

    // Produto
    // produto_lista
    Route::get('/produto/cadastro/{id?}', 'ProdutoController@cadastro')->name('produto_cadastro');
    Route::post('/produto/salvar/{id?}', 'ProdutoController@salvar')->name('produto_salvar');
    Route::get('/produto/excluir/{id}', 'ProdutoController@excluir')->name('produto_excluir');

    // fotos_produto Produto
    Route::get('/fotos_produto/lista/{id_produto}', 'FotosProdutoController@lista')->name('fotos_produto_lista');
    Route::get('/fotos_produto/cadastro/{id_produto}', 'FotosProdutoController@cadastro')->name('fotos_produto_cadastro');
    Route::post('/fotos_produto/salvar/{id_produto}', 'FotosProdutoController@salvar')->name('fotos_produto_salvar');
    Route::get('/fotos_produto/excluir/{id_produto}/{id_foto}', 'FotosProdutoController@excluir')->name('fotos_produto_excluir');

    // Categorias Produto
    Route::get('/categorias_produto/lista/{id_produto}', 'CategoriasProdutoController@lista')->name('categorias_produto_lista');
    Route::get('/categorias_produto/cadastro/{id_produto}', 'CategoriasProdutoController@cadastro')->name('categorias_produto_cadastro');
    Route::post('/categorias_produto/salvar/{id_produto}', 'CategoriasProdutoController@salvar')->name('categorias_produto_salvar');
    Route::get('/categorias_produto/excluir/{id_produto}/{id_categoria}', 'CategoriasProdutoController@excluir')->name('categorias_produto_excluir');

    // Plataformas Produto
    Route::get('/plataformas_produto/lista/{id_produto}', 'PlataformasProdutoController@lista')->name('plataformas_produto_lista');
    Route::get('/plataformas_produto/cadastro/{id_produto}', 'PlataformasProdutoController@cadastro')->name('plataformas_produto_cadastro');
    Route::post('/plataformas_produto/salvar/{id_produto}', 'PlataformasProdutoController@salvar')->name('plataformas_produto_salvar');
    Route::get('/plataformas_produto/excluir/{id_produto}/{id_categoria}', 'PlataformasProdutoController@excluir')->name('plataformas_produto_excluir');

});