<?php

namespace FinanceiroPessoal;

use Illuminate\Database\Eloquent\Model;

class ContaMovimento extends Model
{
    
    protected $table = 'conta_movimentos';

    protected $fillable = ['titular','agencia','numero','tipo_conta'];

    public function lancamento(){
        return $this->hasMany('FinanceiroPessoal\Lancamento');
    }
}
