<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

            // Permissões do usuario
            $table->string('pvisualizar_usuarios', 1);
            $table->string('pcadastrar_usuarios', 1);
            $table->string('pdeletar_usuarios', 1);
            $table->string('peditar_usuarios', 1);

            // Permissões do clientes
            $table->string('pvisualizar_clientes', 1);
            $table->string('pcadastrar_clientes', 1);
            $table->string('pdeletar_clientes', 1);
            $table->string('peditar_clientes', 1);
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
