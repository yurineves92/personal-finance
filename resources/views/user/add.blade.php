@extends('layout.principal')

@section('conteudo')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li><a href="/user/index"><i class="fa fa-user"></i> Usuário</a></li>
	  <li class="active">Formulário</li>
	</ol>
</section>
<section class="content">
	<div>
	<div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Formulário</h3>
      </div>
      <div class="box-body">
        <div class="card-body">
          @if ($message = Session::get('alert-danger'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
          </div>
          @endif
	        <form action="/user/create" role="form" method="POST">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Nome</label>
						    <input type="text" class="form-control" name="nome" placeholder="Digite o nome do usuário">
		              </div>
		            </div>
		            @if ($errors->has('nome'))
		                <div class="alert alert-danger">{{ $errors->first('nome') }}</div>
		            @endif
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Email</label>
						    <input type="text" class="form-control" name="email" placeholder="Digite o nome do cliente">
		              </div>
		            </div>
		            @if ($errors->has('email'))
		                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
		            @endif
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Senha</label>
						    <input type="password" class="form-control" name="password" placeholder="Digite a senha do usuário">
		              </div>
		            </div>
		            @if ($errors->has('password'))
		                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
		            @endif
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Repetir Senha</label>
						    <input type="password" class="form-control" name="remember_password" placeholder="Repita a senha">
		              </div>
		            </div>
		            @if ($errors->has('remember_password'))
		                <div class="alert alert-danger">{{ $errors->first('remember_password') }}</div>
		            @endif
		        </div>
          		<div class="text-center">
        			<button class="btn btn-primary" type="submit">Enviar</button>
        			<a class="btn btn-default" href="/user/index">Voltar</a>
          		</div>
          	</form>
      	  </div>
        </div>
	  </div>	
    </div>
</section>
@endsection