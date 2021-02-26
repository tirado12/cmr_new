<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->date('acta_integracion_consejo')->nullable();
            $table->date('acta_priorizacion')->nullable();
            $table->boolean('prodim')->nullable();
            $table->boolean('gastos_indirectos')->nullable();
            $table->string('anio',4);
            $table->string('anio_inicio',4);
            $table->string('anio_fin',4);
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('clave')->on('municipio');
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
        Schema::dropIfExists('cliente');
    }
}
