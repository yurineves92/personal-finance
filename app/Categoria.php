<?php

namespace FinanceiroPessoal;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nome'];

    public function lancamento(){
        return $this->hasMany('FinanceiroPessoal\Lancamento');
    }
}
