<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportadoraModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('transportadora_models', function (Blueprint $table) {
    $table->increments('id');
    $table->string('Transportadora', 100);  
    $table->mediumText('Token');
    $table->mediumText('Client_id')->nullable();
    $table->string('Client_Secret')->nullable();
    $table->string('User_Agent')->nullable();
    $table->string('Nome_Aplicacao')->nullable();   
    $table->mediumText('Authorization')->nullable();
    $table->string('Url_Redir')->nullable();
    $table->string('CallBack')->nullable();
    $table->string('Url_transp')->nullable();
    $table->mediumtext('Content_Type')->nullable();
    $table->mediumtext('scope')->nullable();
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
        Schema::dropIfExists('transportadora_models');
    }
}
