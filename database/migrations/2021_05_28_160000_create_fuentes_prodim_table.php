<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuentesProdimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuentes_prodim', function (Blueprint $table) {
            $table->id('id_fuente_prodim');
            $table->unsignedBigInteger('prodim_id');
            $table->foreign('prodim_id')->references('id_prodim')->on('prodim_catalogo');
            $table->unsignedBigInteger('fuente_financiamiento_cliente_id')->nullable();
            $table->foreign('fuente_financiamiento_cliente_id')->references('id_fuente_financ_cliente')->on('fuentes_clientes');
            $table->integer('monto')->nullable();
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
        Schema::dropIfExists('fuentes_prodim');
    }
}
