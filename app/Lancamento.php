<?php

namespace FinanceiroPessoal;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    protected $table = 'lancamentos';

    protected $fillable = ['descricao','tipo_lancamento','valor','data_lancamento','data_pagamento','data_vencimento','status','categoria_id','user_id','tipo_pagamento_id','conta_movimento_id'];

    public function user(){
        return $this->belongsTo('FinanceiroPessoal\User');
    }
    public function categoria(){
        return $this->belongsTo('FinanceiroPessoal\Categoria');
    }
    public function tipo_pagamento(){
        return $this->belongsTo('FinanceiroPessoal\TipoPagamento');
    }
    public function conta_movimento(){
        return $this->belongsTo('FinanceiroPessoal\ContaMovimento');
    }
}
