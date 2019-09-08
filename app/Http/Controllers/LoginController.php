<?php

namespace FinanceiroPessoal\Http\Controllers;

use Request;
use Session;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
    
    public function authenticate(){
    	$credenciais = Request::only('email','password');
    	if(Auth::attempt($credenciais)) {
            // Authentication passed...
            Session::flash('alert-success', 'Logado com sucesso!');
            return redirect('/');
        }else{
        	Session::flash('alert-danger', 'O email e a senha estão incorretos, digite novamente!');
        	return redirect()->action("LoginController@login");
        }
    }
    public function logout(){
    	Auth::logout();
    	Session::flash('alert-info', 'Deslogado com sucesso!');
        return redirect()->action("LoginController@login");
    }
}
