@extends('layout.principal')

@section('conteudo')
<!-- Content Header (Page header) -->
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li class="active">Usuários</li>
	</ol>
</section>
<section class="content">
	<div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Usuários</b></h3>
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
      <a href="/user/add" class="btn btn-primary">
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
        @foreach($users as $u)
        <tr>
          <td>{{$u->id}}</td>
          <td>{{$u->nome}}</td>
          <td>
            <form action="/user/delete/{{$u->id}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <a href="/user/edit/{{$u->id}}" class="btn btn-primary">
              <span class="fa fa-pencil"></span>
            </a>
            <a href="/user/change/{{$u->id}}" class="btn btn-info">
              <span class="fa fa-key"></span>
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