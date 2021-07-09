<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePspModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psp_models', function (Blueprint $table) {
         
            $table->increments('id');
            $table->integer('id_banco')->unsigned();     
            $table->mediumText('EndPoint');
            $table->string('PutPoint');
            $table->string('GetPoint');
            $table->string('grant_type');
            $table->string('scope');
            $table->string('Content_Type');
            $table->mediumText('Authorization');
            $table->timestamps();






        });
        Schema::table('psp_models', function (Blueprint $table) {
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
        Schema::dropIfExists('psp_models');
    }
}
