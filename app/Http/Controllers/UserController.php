<?php

namespace FinanceiroPessoal\Http\Controllers;

use Request;
use Hash;
use Session;
use Auth;
use FinanceiroPessoal\User;

class UserController extends Controller
{
    public function index(){
    	$users = User::all();
    	return view('user.index')->with("users",$users);
    }
   	public function add(){
   		return view('user.add');
   	}
   	public function create(){
   		$params = Request::all();
		$params['password'] = Hash::make($params['password']);
		$user = new User($params);
   		$user->save();
   		Session::flash('alert-success', 'Usuário criado com sucesso');
    	return redirect()->action("UserController@index");
   	}
   	public function edit($id){
   		$user = User::find($id);
   		return view('user.edit',compact('user'));
   	}
   	public function update($id){
   		$params = Request::all();
   		$user = User::find($id);
   		$user->update($params);
   		Session::flash('alert-success', 'Usuário atualizado com sucesso');
    	return redirect()->action("UserController@index");
   	}
   	public function delete($id){
   		$user = User::findOrFail($id)->delete();
      	Session::flash('alert-success', 'O usuário foi removido com sucesso!');
      	return redirect()->action("UserController@index");
   	}
}
