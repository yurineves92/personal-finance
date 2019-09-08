@extends('layout.principal')

@section('conteudo')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li></li>><i class="fa fa-cube"></i> Contas em Movimentos</li>	
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
	        <form action="/accounts/update/{{$account->id}}" role="form" method="POST">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	           <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Titular</label>
						    <input type="text" class="form-control" name="titular" value="{{$account->titular}}" placeholder="Digite o titular da conta">
		              </div>
		            </div>
		            @if ($errors->has('titular'))
		                <div class="alert alert-danger">{{ $errors->first('titular') }}</div>
		            @endif
		        </div>
	            <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Agência</label>
						    <input type="text" class="form-control" name="agencia" value="{{$account->agencia}}" placeholder="Digite a agência da conta">
		              </div>
		            </div>
		            @if ($errors->has('agencia'))
		                <div class="alert alert-danger">{{ $errors->first('agencia') }}</div>
		            @endif
		        </div>
	            <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Número da Conta</label>
						    <input type="text" class="form-control" name="numero" value="{{$account->numero}}" placeholder="Digite o número da conta">
		              </div>
		            </div>
		            @if ($errors->has('numero'))
		                <div class="alert alert-danger">{{ $errors->first('numero') }}</div>
		            @endif
		        </div>
		         <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               	<label for="Title">Tipo de Conta</label>
						<select class="form-control" name="tipo_conta">
							@if($account->tipo_conta == 1)
							<option value="1" selected>Aplicação</option>
							<option value="2">Conta Corrente</option>
							<option value="3">Poupança</option>
							@elseif($account->tipo_conta == 2)
							<option value="1">Aplicação</option>
							<option value="2" selected>Conta Corrente</option>
							<option value="3">Poupança</option>
							@else
							<option value="1">Aplicação</option>
							<option value="2">Conta Corrente</option>
							<option value="3" selected>Poupança</option>
							@endif
						</select>   
		              </div>
		            </div>
		            @if ($errors->has('tipo_conta'))
		                <div class="alert alert-danger">{{ $errors->first('tipo_conta') }}</div>
		            @endif
		        </div>
          		<div>
        			<button class="btn btn-primary" type="submit">Enviar</button>
        			<a class="btn btn-default" href="/accounts/index">Voltar</a>
          		</div>
          	</form>
      	  </div>
        </div>
	  </div>	
    </div>
</section>
@endsection