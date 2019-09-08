@extends('layout.principal')

@section('conteudo')
<section class="content-header">
	<br>
	<ol class="breadcrumb">
	  <li><a href="/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	  <li><a href="/transactions/index"><i class="fa fa-database"></i> Lançamentos</a></li>
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
	        <form action="/transactions/update/{{$lancamento->id}}" role="form" method="POST">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <input type="hidden" name="tipo_lancamento" value="{{$type}}">
	            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	            <div class="row">
		            <div class="col-md-6">
		              <div class="form-group">
		               <label for="Title">Conta </label>
						    <select class="form-control" name="conta_movimento_id">
						    @foreach($contas as $c)
						    	@if($lancamento->conta_movimento_id == $c->conta_movimento_id)
						    		<option value="{{$c->id}}" selected>{{$c->id}} - {{$c->titular}}</option>
						    	@else
						    		<option value="{{$c->id}}">{{$c->id}} - {{$c->titular}}</option>
						    	@endif
						    @endforeach
						    </select>
		              </div>
		            </div>
		            @if ($errors->has('conta_movimento_id'))
		                <div class="alert alert-danger">{{ $errors->first('conta_movimento_id') }}</div>
		            @endif
		            <div class="col-md-3">
		              <div class="form-group">
		               <label for="Title">Data de Lançamento </label>
						    <input type="date" class="form-control" name="data_lancamento" value="{{$lancamento->data_lancamento}}" placeholder="Selecione a conta">
		              </div>
		            </div>
		            @if ($errors->has('data_pagamento'))
		                <div class="alert alert-danger">{{ $errors->first('data_vencidata_pagamentomento') }}</div>
		            @endif
		        </div>
		        <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Descrição </label>
						   <textarea class="form-control" rows="3" maxlength="255" name="descricao" placeholder="Digite a descrição do lançamento no máximo 255 caracteres">{{$lancamento->descricao}}</textarea>
		              </div>
		            </div>
		            @if ($errors->has('descricao'))
		                <div class="alert alert-danger">{{ $errors->first('descricao') }}</div>
		            @endif
		        </div>
		        <h4 class="box-title">Informações do Pagamento</h4>
		        <hr/>
		        <div class="row">
		            <div class="col-md-6 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Tipo de Pagamento</label>
							<select class="form-control" name="tipo_pagamento_id">
						  		@foreach($tipo_pagamentos as $t)
							  		@if($lancamento->tipo_pagamento_id == $t->id)
							    	<option value="{{$t->id}}" selected>{{$t->nome}}</option>
							    	@else
							    	<option value="{{$t->id}}">{{$t->nome}}</option>
							    	@endif
						    	@endforeach
							</select>
		              </div>
		            </div>
		            @if ($errors->has('descricao'))
		                <div class="alert alert-danger">{{ $errors->first('descricao') }}</div>
		            @endif
		            <div class="col-md-3">
		              <div class="form-group">
		               	<label for="Title">Status </label>
						   <select class="form-control" name="status">
						   		@if($lancamento->status == 1)
						    	<option value="1" selected>Aguardando</option>
						    	<option value="2">Pago</option>
						    	<option value="3">Negociação</option>
						    	@elseif($lancamento->status == 2)
						    	<option value="1">Aguardando</option>
						    	<option value="2" selected>Pago</option>
						    	<option value="3">Negociação</option>
						    	@else
						    	<option value="1">Aguardando</option>
						    	<option value="2">Pago</option>
						    	<option value="3" selected>Negociação</option>
						    	@endif
							</select>
		              	</div>
		            </div>
		            @if ($errors->has('descricao'))
		                <div class="alert alert-danger">{{ $errors->first('status') }}</div>
		            @endif
					<div class="col-md-3">
		              <div class="form-group">
		               <label for="Title">Data de Pagamento </label>
						    <input type="date" class="form-control" name="data_pagamento" value="{{$lancamento->data_pagamento}}" placeholder="Selecione a conta">
		              </div>
		            </div>
		            @if ($errors->has('data_pagamento'))
		                <div class="alert alert-danger">{{ $errors->first('data_pagamento') }}</div>
		            @endif
		        </div>
		        <div class="row">
		        	<div class="col-md-3">
		              <div class="form-group">
		               	<label for="Title">Categoria </label>
						   <select class="form-control" name="categoria_id">
						  	@foreach($categorias as $c)
						  		@if($lancamento->categoria_id == $c->id)
						    	<option value="{{$c->id}}" selected>{{$c->nome}}</option>
						    	@else
						    	<option value="{{$c->id}}">{{$c->nome}}</option>
						    	@endif
						    @endforeach
							</select>
		              	</div>
		            </div>
		            @if ($errors->has('descricao'))
		                <div class="alert alert-danger">{{ $errors->first('categoria_id') }}</div>
		            @endif
		            <div class="col-md-3">
		              <div class="form-group">
		               <label for="Title">Data de Vencimento </label>
						    <input type="date" class="form-control" name="data_vencimento" value="{{$lancamento->data_lancamento}}" placeholder="Selecione a conta">
		              </div>
		            </div>
		            @if ($errors->has('data_vencimento'))
		                <div class="alert alert-danger">{{ $errors->first('data_vencimento') }}</div>
		            @endif
		            <div class="col-md-3">
		              <div class="form-group">
		               <label for="Title">Valor</label>
						    <input type="text" class="form-control" name="valor" value="{{$lancamento->valor}}" placeholder="Digite o valor do lançamento">
		              </div>
		            </div>
		            @if ($errors->has('valor'))
		                <div class="alert alert-danger">{{ $errors->first('valor') }}</div>
		            @endif
		           
		        </div>
          		<div>
        			<button class="btn btn-primary" type="submit">Enviar</button>
        			<a class="btn btn-default" href="/transactions/{{$type}}">Voltar</a>
          		</div>
          	</form>
      	  </div>
        </div>
	  </div>	
    </div>
</section>
<script type="text/javascript" src="/js/jquery.mask.js"></script>
<script type="text/javascript" src="/js/money.js"></script>
@endsection