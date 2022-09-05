<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get ('/','PrincipalController@Principal')-> name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobrenos')-> name('site.sobrenos'); 
Route::get('/contato', 'ContatoController@contato')-> name('site.contato');
Route::get('/login', function(){return 'login';})-> name('site.login');

Route::prefix ('/app')-> group (function(){

    Route::get('/clientes', function(){return 'clientes';})-> name('app.clientes');
    Route::get('/fornecedores', function(){return 'fornecedores';})-> name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})-> name('app.produtos');
    
});

Route::get ('/rota1', function(){
    echo 'Rota 1';
})-> name('site.rota1');

Route::get ('/rota2', function(){
    return redirect()->route('site.rota1');
})-> name('site.rota2');

Route::fallback(function(){
        echo ' A página acessada não existe. Por favor <a href= "'.route('site.index').'">clique aqui</a> para ser ridirecionado a página principal';
});





