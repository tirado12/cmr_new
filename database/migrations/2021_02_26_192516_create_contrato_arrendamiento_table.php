<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoArrendamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_arrendamiento', function (Blueprint $table) {
            $table->id('id_contrato_arrendamiento');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_contrato');
            $table->double('monto_contratado');
            $table->unsignedBigInteger('obra_administracion_id');
            $table->foreign('obra_administracion_id')->references('id_obra_administracion')->on('obra_administracion');
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id_proveedor')->on('proveedor');
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
        Schema::dropIfExists('contrato_arrendamiento');
    }
}
