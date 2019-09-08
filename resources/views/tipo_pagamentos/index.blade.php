@extends('layout.principal')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li class="active"><i class="fa fa-file"></i> Tipo de pagamentos</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Tipo de pagamentos</b></h3>
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
      <a href="/payments/add" class="btn btn-primary">
            <span class="fa fa-plus-circle"></span> Adicionar
        </a>
    </div>
    <br>
    <div class="table-responsive">
    <table id="data_table" class="table table-bordered">
      <thead>
        <th>#</th>
        <th>Nome</th>
        <th>Ações</th>
      </thead>
      <tbody>
        @foreach($tipo_pagamentos as $t)
        <tr>
          <td>{{$t->id}}</td>
          <td>{{$t->nome}}</td>
          <td>
            <form action="/payments/delete/{{$t->id}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <a href="/payments/edit/{{$t->id}}" class="btn btn-primary">
              <span class="fa fa-pencil"></span>
            </a>
            <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</section>
@endsection