@extends('layout.principal')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li class="active"><i class="fa fa-database"></i> Financeiro</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
      <div class="box-header with-border">
        @if($id == 1)
        <h3 class="box-title">Despesas</h3>
        @elseif($id == 2)
        <h3 class="box-title">Receitas</h3>
        @endif
      </div>
      <div class="box-body">
      @if ($message = Session::get('alert-success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button> 
              <strong>{{ $message }}</strong>
      </div>
      @elseif ($message = Session::get('alert-danger'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">X</button> 
              <strong>{{ $message }}</strong>
      </div>
      @endif
      </div>
    <div class="box-body">
	    <div>
      @if($id == 1)
      <a href="/transactions/add/{{1}}" class="btn btn-danger">
          <span class="fa fa-plus-circle"></span> Despesa
      </a>
      @elseif($id == 2)
      <a href="/transactions/add/{{2}}" class="btn btn-success">
          <span class="fa fa-plus-circle"></span> Receita
      </a>
      @endif
    </div>
    <br>
    <div class="table-responsive" style="font-size: 12px;">
    <table id="data_table" class="table table-bordered">
      <thead>
        <th>Código</th>
        <th>Data de Lançamento</th>
        <th>Descrição</th>
        <th>Tipo de Pagamento</th>
        <th>Data de Vencimento</th>
        <th>Categoria</th>
        <th>Conta</th>
        <th>Data de Pagamento</th>
        <th>Valor R$</th>
        <th>Status</th>
        <th>Ações</th>
      </thead>
      <tbody>
        @foreach($lancamentos as $l)
        <tr class="{{$l->status == 1 ? 'danger' : 'success' }}">
          <td>{{$l->id}}</td>
          <td>{{date('d/m/Y', strtotime($l->data_lancamento))}}</td>
          <td>{{$l->descricao}}</td>
          <td>{{$l->tipo_pagamento->nome}}</td>
          <td>{{date('d/m/Y', strtotime($l->data_vencimento))}}</td>
          <td>{{$l->categoria->nome}}</td>
          <td>{{$l->conta_movimento->titular}}</td>
          <td>
            @if(!empty($l->data_pagamento))
            {{date('d/m/Y', strtotime($l->data_pagamento))}}
            @else
             <a href="" data-target="#modal-payment-{{$l->id}}" data-toggle="modal" class="btn btn-success"><span class="fa fa-money"></span> Pagar</a>
            @endif
          </td>
          <td><?php echo number_format($l->valor, 2, ',', '.'); ?></td>
          @if($l->status == 1)
          <td>Aguardando Pgt.</td>
          @elseif($l->status == 2)
          <td>Pago</td>
          @else
          <td>Negociação</td>
          @endif
          <td>
            <form action="/transactions/delete/{{$l->id}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <a href="/transactions/edit/{{$l->tipo_lancamento}}/{{$l->id}}" class="btn btn-primary">
              <span class="fa fa-pencil"></span>
            </a>
            <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
            </form>
          </td>
        </tr>
        @include('lancamentos.modal')
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</section>
@endsection