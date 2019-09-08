<?php

namespace FinanceiroPessoal\Http\Controllers;

use Request;
use Session;
use Auth;
use PDF;
use FinanceiroPessoal\Lancamento;
use FinanceiroPessoal\Categoria;
use FinanceiroPessoal\TipoDocumento;
use FinanceiroPessoal\ContaMovimento;

class ReportController extends Controller
{
   	public function reports(){
   		return view('reports.index');
   	}
   	public function reports_transactions_rapid(){
		$data_inicial = "01/" . date("m") ."/" . date("Y");
		$data_final = date("t/m/Y");
        $lancamentos = Lancamento::where('data_vencimento', '>=', $data_inicial)->where('data_vencimento', '<=', $data_final)->get();
		$pdf = PDF::loadView('reports.pdf',['lancamentos'=>$lancamentos],compact('data_inicial','data_final'));
        return $pdf->stream();

   	}	
   	public function reports_transactions(){
		$params = Request::all();
		$lancamentos = Lancamento::where('data_vencimento', '>=', $params['data_vencimento_inicial'])->where('data_vencimento', '<=', $params['data_vencimento_final'])
			->where('tipo_pagamento_id','=',$params['tipo'])
			->where('status','=',$params['status'])->get();
		$data_inicial =  date('d/m/Y',strtotime($params['data_vencimento_inicial']));
   		$data_final = date('d/m/Y',strtotime($params['data_vencimento_final']));
		$pdf = PDF::loadView('reports.pdf',['lancamentos'=>$lancamentos],compact('data_inicial','data_final'));
        return $pdf->stream();
   	}
}
