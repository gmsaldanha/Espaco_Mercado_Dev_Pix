<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacoesModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_banco')->unsigned();            
            $table->string('Conta', 45);
            $table->string('Historico', 150);                
            $table->enum("Op", ["E", "S"])->default("S");//entrada-saida
            $table->double("Valor", 11, 3)->default("0");
            $table->text('Payload')->nullable();

            $table->string('Calendario')->nullable();
            $table->string('Location')->nullable();
            $table->string('Txid')->nullable();
            $table->string('Revisao')->nullable();
            $table->string('Cpf_devedor')->nullable();
            $table->string('Nome_devedor')->nullable();
            $table->string('Valordev')->nullable();
            $table->string('Chave')->nullable();
            $table->string('Solicitacao')->nullable();
            $table->string('Statusoperacao')->nullable();
            $table->string('Endtoendid')->nullable();
            $table->string('Pagadorcpf')->nullable();
            $table->string('Pagadornome')->nullable();
            $table->string('Horario')->nullable();
            $table->string('Rtrid')->nullable();
            $table->enum("Status", ["F", "P","C"])->default("P");//finalizada-pendente-cancelada
            $table->dateTime("Data_trans")->nullable();
            $table->dateTime("Data_rec")->nullable();
           
           
           
           
           
           
           
           
           
           
            $table->timestamps();
        });

        Schema::table('transacoes_models', function (Blueprint $table) {
            $table->foreign('id_banco')->references('id_banco')->on('contas_models');
        });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacoes_models');
    }
}
