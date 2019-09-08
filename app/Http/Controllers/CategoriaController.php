<?php

namespace FinanceiroPessoal\Http\Controllers;

use Request;
use Session;
use Auth;
use FinanceiroPessoal\Categoria;

class CategoriaController extends Controller
{
    public function index(){
    	$categorias = Categoria::all();
    	return view('categorias.index')->with("categorias",$categorias);
    }
   	public function add(){
   		return view('categorias.add');
   	}
   	public function create(){
   		$params = Request::all();
   		$categoria = new Categoria($params);
   		$categoria->save();
   		Session::flash('alert-success', 'Categoria criada com sucesso!');
    	return redirect()->action("CategoriaController@index");
   	}
   	public function edit($id){
   		$categoria = Categoria::find($id);
   		return view('categorias.edit')->with("category",$categoria);
   	}
   	public function update($id){
   		$params = Request::all();
   		$categoria = Categoria::find($id);
   		$categoria->update($params);
   		Session::flash('alert-success', 'Categoria atualizada com sucesso!');
    	return redirect()->action("CategoriaController@index");
   	}
   	public function delete($id){
   		$categoria = Categoria::findOrFail($id)->delete();
      	Session::flash('alert-success', 'A categoria foi removido com sucesso!');
      	return redirect()->action("CategoriaController@index");
   	}
}
