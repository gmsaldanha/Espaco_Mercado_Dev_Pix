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
    $table->mediumText('Client_id');
    $table->mediumText('Authorization');
    $table->string('Url_Redir');
    $table->string('CallBack');
    $table->string('Url_transp');
    $table->mediumtext('Content_Type');
    $table->mediumtext('scope');
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
