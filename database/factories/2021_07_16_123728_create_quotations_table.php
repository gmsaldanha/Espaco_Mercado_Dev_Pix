<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('from_cep');
            $table->bigInteger('to_cep');
            $table->bigInteger('height');
            $table->bigInteger('width');
            $table->bigInteger('length');
            $table->float('weight');
            $table->float('value');
            $table->boolean('ar')->default(0);
            $table->boolean('mp')->default(0);
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
        Schema::dropIfExists('quotations');
    }
}
