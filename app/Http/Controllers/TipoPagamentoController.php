<?php

namespace FinanceiroPessoal\Http\Controllers;

use Request;
use Session;
use Auth;
use FinanceiroPessoal\TipoPagamento;

class TipoPagamentoController extends Controller
{
    public function index(){
    	$tipo_pagamentos = TipoPagamento::all();
    	return view('tipo_pagamentos.index')->with('tipo_pagamentos',$tipo_pagamentos);
    }
    public function add(){
   		return view('tipo_pagamentos.add');
   	}
   	public function create(){
   		$params = Request::all();
   		$tipo_pagamento = new TipoPagamento($params);
   		$tipo_pagamento->save();
   		Session::flash('alert-success', 'Tipo de documento criado com sucesso!');
    	return redirect()->action("TipoPagamentoController@index");
   	}
   	public function edit($id){
   		$tipo_pagamento = TipoPagamento::find($id);
   		return view('tipo_pagamentos.edit')->with("tipo_pagamento",$tipo_pagamento);
   	}
   	public function update($id){
   		$params = Request::all();
   		$tipo_pagamento = TipoPagamento::find($id);
   		$tipo_pagamento->update($params);
   		Session::flash('alert-success', 'Tipo de documento atualizado com sucesso!');
    	return redirect()->action("TipoPagamentoController@index");
   	}
   	public function delete($id){
   		$tipo_pagamento = TipoPagamento::findOrFail($id)->delete();
      	Session::flash('alert-success', 'O tipo de documento foi removido com sucesso!');
      	return redirect()->action("TipoPagamentoController@index");
   	}
}
