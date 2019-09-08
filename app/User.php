<?php

namespace FinanceiroPessoal;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password',
    ];
    
    public function lancamento(){
        return $this->hasMany('FinanceiroPessoal\Lancamento');
    }
}
