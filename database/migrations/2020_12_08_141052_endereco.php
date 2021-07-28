<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Endereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cliente')->nullable();
            $table->string('estado', 255);
            $table->string('cidade', 255);
            $table->string('bairro', 255);
            $table->string('endereco', 255);
            $table->string('numero', 10);
            $table->string('complemento', 255);
            $table->string('cep', 9);
            $table->rememberToken();
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
        //
    }
}
