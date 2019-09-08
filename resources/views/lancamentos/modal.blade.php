<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-payment-{{$l->id}}">
	<form action="/transactions/pay/{{$l->id}}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token()}}">
	<input type="hidden" name="tipo_lancamento" value="{{$id}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Efetuar o Pagemento</h4>
			</div>
			<div class="modal-body">
				<label for="Title">Data de Pagamento </label>
				    <input type="date" class="form-control" name="data_pagamento" placeholder="Selecione a conta">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	</form>
</div>