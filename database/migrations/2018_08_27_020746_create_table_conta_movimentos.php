<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContaMovimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_movimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titular',100);
            $table->string('agencia',100);
            $table->string('numero',100);
            $table->integer('tipo_conta');
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
        Schema::dropIfExists('conta_movimentos');
    }
}
