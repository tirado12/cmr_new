<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_facturas', function (Blueprint $table) {
            $table->unsignedBigInteger('factura_id');
            $table->foreign('factura_id')->references('id_factura')->on('facturas');
            $table->unsignedBigInteger('contrato_arrendamiento_id');
            $table->foreign('contrato_arrendamiento_id')->references('id_contrato_arrendamiento')->on('contratos_arrendamientos');
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
        Schema::dropIfExists('contrato_facturas');
    }
}
