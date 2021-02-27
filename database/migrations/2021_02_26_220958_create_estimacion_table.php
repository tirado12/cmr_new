<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimacion', function (Blueprint $table) {
            $table->integer('numero_estimacion')->nullable();
            $table->integer('total_estimacion')->nullable();
            $table->double('supervicion_obra')->nullable();
            $table->double('mano_obra')->nullable();
            $table->double('cinco_millar')->nullable();
            $table->double('dos_millar')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_final')->nullable();
            $table->date('fecha_estimacion')->nullable();
            $table->string('folio_factura',36)->nullable();
            $table->integer('caratula_estimacion')->nullable();
            $table->integer('presupuesto_estimacion')->nullable();
            $table->integer('cuerpo_estimacion')->nullable();
            $table->integer('numero_generadores_estimacion')->nullable();
            $table->integer('resumen_estimacion')->nullable();
            $table->integer('estado_cuenta_estimacion')->nullable();
            $table->integer('croquis_ilustrativo_estimacion')->nullable();
            $table->integer('reporte_fotografico_estimacion')->nullable();
            $table->unsignedBigInteger('obra_contrato_id')->nullable();
            $table->foreign('obra_contrato_id')->references('id_obra_contrato')->on('obra_contrato');
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
        Schema::dropIfExists('estimacion');
    }
}
