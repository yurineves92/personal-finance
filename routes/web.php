<?php

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
//Rotas iniciais para registro, acesso e logout
Route::get('/login',['as' => 'login', 'uses' => 'LoginController@login']);
Route::post('/authenticate','LoginController@authenticate');
Route::get('/register','LoginController@register');
Route::post('/registering','LoginController@registering');
Route::get('/logout','LoginController@logout');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', function () {
        return view('index');
    });
    //Usuários
    Route::get('/user/index','UserController@index');
    Route::get('/user/add','UserController@add');
    Route::post('/user/create','UserController@create');
    Route::get('/user/edit/{id}','UserController@edit');
    Route::post('/user/update/{id}','UserController@update');
    Route::post('/user/delete/{id}','UserController@delete');

    //Categorias
    Route::get('/category/index','CategoriaController@index');
    Route::get('/category/add','CategoriaController@add');
    Route::post('/category/create','CategoriaController@create');
    Route::get('/category/edit/{id}','CategoriaController@edit');
    Route::post('/category/update/{id}','CategoriaController@update');
    Route::post('/category/delete/{id}','CategoriaController@delete');

    //Tipo de Documentos
    Route::get('/payments/index','TipoPagamentoController@index');
    Route::get('/payments/add','TipoPagamentoController@add');
    Route::post('/payments/create','TipoPagamentoController@create');
    Route::get('/payments/edit/{id}','TipoPagamentoController@edit');
    Route::post('/payments/update/{id}','TipoPagamentoController@update');
    Route::post('/payments/delete/{id}','TipoPagamentoController@delete');

    //Conta de Movimento
    Route::get('/accounts/index','ContaMovimentoController@index');
    Route::get('/accounts/add','ContaMovimentoController@add');
    Route::post('/accounts/create','ContaMovimentoController@create');
    Route::get('/accounts/edit/{id}','ContaMovimentoController@edit');
    Route::post('/accounts/update/{id}','ContaMovimentoController@update');
    Route::post('/accounts/delete/{id}','ContaMovimentoController@delete');

    //Lançamentos
    Route::get('/transactions/{id}','LancamentoController@index');
    Route::get('/transactions/add/{id}','LancamentoController@add');
    Route::post('/transactions/create','LancamentoController@create');
    Route::get('/transactions/edit/{type}/{id}','LancamentoController@edit');
    Route::post('/transactions/update/{id}','LancamentoController@update');
    Route::post('/transactions/delete/{id}','LancamentoController@delete');
    Route::post('/transactions/pay/{id}','LancamentoController@pay');

    //Relatórios
    Route::get('/reports','ReportController@reports');
    Route::post('/reports/transactions_rapid','ReportController@reports_transactions_rapid');
    Route::post('/reports/transactions','ReportController@reports_transactions');

});