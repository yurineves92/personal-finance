<?php

namespace FinanceiroPessoal\Http\Controllers;

use Request;
use Session;
use Auth;
use FinanceiroPessoal\Lancamento;
use FinanceiroPessoal\Categoria;
use FinanceiroPessoal\TipoPagamento;
use FinanceiroPessoal\ContaMovimento;


class LancamentoController extends Controller
{
    public function index($id){
    	$lancamentos = Lancamento::where('tipo_lancamento',$id)->get();
    	return view('lancamentos.index',compact('lancamentos','id'));
    }
    public function add($id){
    	$categorias = Categoria::all();
    	$tipo_pagamentos = TipoPagamento::all();
    	$contas = ContaMovimento::all();
    	return view('lancamentos.add',compact('categorias','tipo_pagamentos','contas','id'));
    }
    public function create(){
    	$params = Request::all();
    	$lancamento = new Lancamento($params);
        $valor = str_replace('.','',$params['valor']);
        $valor = str_replace(',','.',$valor);
        $lancamento['valor'] = $valor;
   		$lancamento->save();
   		Session::flash('alert-success', 'Lançamento criado com sucesso!');
    	return redirect()->action("LancamentoController@index",['id' => $params['tipo_lancamento']]);
    }
    public function edit($type,$id){
        $lancamento = Lancamento::find($id);
        $categorias = Categoria::all();
        $tipo_pagamentos = TipoPagamento::all();
        $contas = ContaMovimento::all();
        return view('lancamentos.edit',compact('lancamento','categorias','tipo_pagamentos','contas','type'));
    }
    public function update($id){
        $params =  Request::all();
        $lancamento = Lancamento::find($id);
        $valor = str_replace('.','',$params['valor']);
        $valor = str_replace(',','.',$valor);
        $params['valor'] = $valor;
        $lancamento->update($params);
        Session::flash('alert-success', 'Lançamento atualizado com sucesso!');
        return redirect()->action("LancamentoController@index",['id' => $params['tipo_lancamento']]);
    }
    public function pay($id){
        $params = Request::all();
        $lancamento = Lancamento::find($id);
        $lancamento->status = 2;
        $lancamento->update($params);
        Session::flash('alert-success', 'Pagamento efetuado com sucesso!');
        return redirect()->action("LancamentoController@index",['id' => $params['tipo_lancamento']]);
    }
}
