<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('contas_models', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_banco')->unsigned()->index();
                $table->string('Banco', 45);               
                $table->string('NumBanco', 45);               
                $table->string('Agencia', 45);
                $table->string('Conta', 45);
                $table->string('CodigoPix', 150);                
                $table->string('Titular', 100);
                $table->string('Logradouro', 150)->nullable();;  
                $table->string('Municipio', 100);   
                $table->string('Uf', 2)->nullable();;  
                $table->string('TxId', 3);   
                $table->boolean('Padrao')->default(0);
                $table->date('Data');               
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
        Schema::dropIfExists('contasBancarias');
    }
}
