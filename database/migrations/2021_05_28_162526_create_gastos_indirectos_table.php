<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosIndirectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_indirectos', function (Blueprint $table) {
            $table->id('id_indirectos');
            $table->integer('clave');
            $table->string('nombre');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id_cliente')->on('clientes');
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
        Schema::dropIfExists('gastos_indirectos');
    }
}
