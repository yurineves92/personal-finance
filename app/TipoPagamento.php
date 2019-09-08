<?php

namespace FinanceiroPessoal;

use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    
    protected $table = 'tipo_pagamentos';

    protected $fillable = ['nome'];

    public function lancamento(){
        return $this->hasMany('FinanceiroPessoal\Lancamento');
    }
}
