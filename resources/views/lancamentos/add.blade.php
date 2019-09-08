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
      	@if($id == 1)
        <h3 class="box-title">Formulário de Despesa</h3>
        @else
        <h3 class="box-title">Formulário de Receita</h3>
        @endif
      </div>
      <div class="box-body">
        <div class="card-body">
          @if ($message = Session::get('alert-danger'))
          <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{{ $message }}</strong>
          </div>
          @endif
	        <form action="/transactions/create" role="form" method="POST">
	            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	            <input type="hidden" name="tipo_lancamento" value="{{$id}}">
	            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	            <div class="row">
	            	<div class="col-md-3">
		              <div class="form-group">
		               <label for="Title">Data de Lançamento </label>
						    <input type="date" class="form-control" name="data_lancamento" placeholder="Selecione a conta">
		              </div>
		            </div>
		            @if ($errors->has('data_lancamento'))
		                <div class="alert alert-danger">{{ $errors->first('data_lancamento') }}</div>
		            @endif
		            <div class="col-md-4">
		              <div class="form-group">
		               <label for="Title">Conta- Titular </label>
						    <select class="form-control" name="conta_movimento_id">
						    	@foreach($contas as $c)
						    	<option value="{{$c->id}}">{{$c->id}} - {{$c->titular}}</option>
						    	@endforeach
						    </select>
		              </div>
		            </div>
		            @if ($errors->has('conta_movimento_id'))
		                <div class="alert alert-danger">{{ $errors->first('conta_movimento_id') }}</div>
		            @endif
		        </div>
		        <div class="row">
		            <div class="col-md-7 offset-md-3">
		              <div class="form-group">
		               <label for="Title">Descrição </label>
						   <textarea class="form-control" rows="3" maxlength="255" name="descricao" placeholder="Digite a descrição do lançamento no máximo 255 caracteres"></textarea>
		              </div>
		            </div>
		            @if ($errors->has('descricao'))
		                <div class="alert alert-danger">{{ $errors->first('descricao') }}</div>
		            @endif
		        </div>
		        <h4 class="box-title">Informações do Pagamento</h4>
		        <hr/>
		        <div class="row">
		            <div class="col-md-6">
		              <div class="form-group">
		               <label for="Title">Tipo de Pagamento</label>
							<select class="form-control" name="tipo_pagamento_id">
						  		@foreach($tipo_pagamentos as $t)
						    	<option value="{{$t->id}}">{{$t->nome}}</option>
						    	@endforeach
							</select>
		              </div>
		            </div>
		            @if ($errors->has('tipo_pagamento_id'))
		                <div class="alert alert-danger">{{ $errors->first('tipo_pagamento_id') }}</div>
		            @endif
		            <div class="col-md-3">
		              <div class="form-group">
		               	<label for="Title">Status </label>
						   <select class="form-control" name="status">
						    	<option value="1">Aguardando</option>
						    	<option value="2">Pago</option>
						    	<option value="3">Negociação</option>
							</select>
		              	</div>
		            </div>
		            @if ($errors->has('status'))
		                <div class="alert alert-danger">{{ $errors->first('status') }}</div>
		            @endif
					<div class="col-md-3">
		              <div class="form-group">
		               <label for="Title">Data de Pagamento </label>
						    <input type="date" class="form-control" name="data_pagamento" placeholder="Selecione a conta">
		              </div>
		            </div>
		            @if ($errors->has('data_pagamento'))
		                <div class="alert alert-danger">{{ $errors->first('data_vencidata_pagamentomento') }}</div>
		            @endif
		        </div>
		        <div class="row">
		        	<div class="col-md-3">
		              <div class="form-group">
		               	<label for="Title">Categoria </label>
						   <select class="form-control" name="categoria_id">
						  		@foreach($categorias as $c)
						    	<option value="{{$c->id}}">{{$c->nome}}</option>
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
						    <input type="date" class="form-control" name="data_vencimento" placeholder="Selecione a conta">
		              </div>
		            </div>
		            @if ($errors->has('data_vencimento'))
		                <div class="alert alert-danger">{{ $errors->first('data_vencimento') }}</div>
		            @endif
		            <div class="col-md-3">
		              <div class="form-group">
		               <label for="Title">Valor</label>
						    <input type="text" class="form-control" name="valor" placeholder="Digite o valor do lançamento">
		              </div>
		            </div>
		            @if ($errors->has('valor'))
		                <div class="alert alert-danger">{{ $errors->first('valor') }}</div>
		            @endif
		           
		        </div>
          		<div>
        			<button class="btn btn-primary" type="submit">Enviar</button>
        			<a class="btn btn-default" href="/transactions/{{$id}}">Voltar</a>
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