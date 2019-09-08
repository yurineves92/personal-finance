<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLancamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->integer('tipo_lancamento');
            $table->decimal('valor', 10, 2);
            $table->date('data_lancamento')->nullable($value = true);
            $table->date('data_pagamento')->nullable($value = true);
            $table->date('data_vencimento')->nullable($value = true);
            $table->integer('status');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tipo_pagamento_id')->unsigned();
            $table->foreign('tipo_pagamento_id')->references('id')->on('tipo_pagamentos');
            $table->integer('conta_movimento_id')->unsigned();
            $table->foreign('conta_movimento_id')->references('id')->on('conta_movimentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lancamentos');
    }
}
