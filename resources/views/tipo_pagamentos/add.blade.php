@extends('layout.principal')

@section('conteudo')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li><a href="/documents/index"><i class="fa fa-file"></i> Tipo de Documentos</a></li>
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
	        <form action="/payments/create" role="form" method="POST">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Nome</label>
						    <input type="text" class="form-control" name="nome" placeholder="Digite o nome da categoria">
		              </div>
		            </div>
		            @if ($errors->has('nome'))
		                <div class="alert alert-danger">{{ $errors->first('nome') }}</div>
		            @endif
		        </div>
          		<div>
        			<button class="btn btn-primary" type="submit">Enviar</button>
        			<a class="btn btn-default" href="/payments/index">Voltar</a>
          		</div>
          	</form>
      	  </div>
        </div>
	  </div>	
    </div>
</section>
@endsection