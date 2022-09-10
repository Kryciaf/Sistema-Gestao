<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ForncedorController;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\ContatoController@index')->name('site.index');
Route::post('/contato', 'App\Http\Controllers\ContatoController@save')->name('site.contato');

Route::get('/sobre_nos', 'App\Http\Controllers\SobreNosController@index')->name('site.sobre_nos');

Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');
    Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');

    Route::get('/fornecedor', 'App\Http\Controllers\ForncedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\ForncedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\ForncedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}', 'App\Http\Controllers\ForncedorController@editar')->name('app.fornecedor.editar');
    Route::post('/fornecedor/editar/{id}', 'App\Http\Controllers\ForncedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/show/{id}', 'App\Http\Controllers\ForncedorController@show')->name('app.fornecedor.show');
    Route::get('/fornecedor/excluir/{id}', 'App\Http\Controllers\ForncedorController@excluir')->name('app.fornecedor.excluir');

    Route::resource('/produto', 'App\Http\Controllers\ProdutoController');

    Route::resource('/cliente','App\Http\Controllers\ClienteController');

    Route::resource('/pedido', 'App\Http\Controllers\PedidoController');

    Route::get('/pedido-produto/create/{pedido}', 'App\Http\Controllers\PedidoProdutoController@create')->name('pedido_produto.create');
    Route::post('/pedido-produto/store/{pedido}', 'App\Http\Controllers\PedidoProdutoController@store')->name('pedido_produto.store');
    Route::post('/pedido-produto/destroy/{pedido}', 'App\Http\Controllers\PedidoProdutoController@destroy')->name('pedido_produto.destroy');



});
