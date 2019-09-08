<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LancamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}

/**
 *  protected $fillable = [
 * 'descricao',
 * 'tipo_lancamento',
 * 'valor',
 * 'data_lancamento',
 * 'data_pagamento',
 * 'data_vencimento',
 * 'status',
 * 'categoria_id',
 * 'user_id',
 * 'tipo_pagamento_id',
 * 'conta_movimento_id'
 * ];

 */
