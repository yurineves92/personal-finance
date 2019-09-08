<?php

namespace FinanceiroPessoal\Http\Controllers;

use Request;
use Session;
use Auth;
use FinanceiroPessoal\ContaMovimento;

class ContaMovimentoController extends Controller
{
    public function index(){
    	$accounts = ContaMovimento::all();
    	return view('conta_movimentos.index')->with('accounts',$accounts);
    }
    public function add(){
   		return view('conta_movimentos.add');
   	}
   	public function create(){
   		$params = Request::all();
   		$account = new ContaMovimento($params);
   		$account->save();
   		Session::flash('alert-success', 'Conta criado com sucesso!');
    	return redirect()->action("ContaMovimentoController@index");
   	}
   	public function edit($id){
   		$account = ContaMovimento::find($id);
   		return view('conta_movimentos.edit')->with("account",$account);
   	}
   	public function update($id){
   		$params = Request::all();
   		$account = ContaMovimento::find($id);
   		$account->update($params);
   		Session::flash('alert-success', 'Conta atualizado com sucesso!');
    	return redirect()->action("ContaMovimentoController@index");
   	}
   	public function delete($id){
   		$account = ContaMovimento::findOrFail($id)->delete();
      	Session::flash('alert-success', 'A conta foi removido com sucesso!');
      	return redirect()->action("ContaMovimentoController@index");
   	}
}
