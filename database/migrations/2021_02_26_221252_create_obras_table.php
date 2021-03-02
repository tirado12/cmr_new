<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id('id_obra');
            $table->integer('numero_obra')->nullable();
            $table->text('nombre_obra')->nullable();
            $table->string('numero_contrato')->nullable();
            $table->string('oficio_notificacion')->nullable();
            $table->double('monto_contratado')->nullable();
            $table->double('monto_modificado')->nullable();
            $table->date('fecha_contrato')->nullable();
            $table->date('fecha_inicio_programada')->nullable();
            $table->date('fecha_final_programada')->nullable();
            $table->date('fecha_inicio_real')->nullable();
            $table->date('fecha_final_real')->nullable();
            $table->boolean('modalidad_ejecucion')->nullable();
            $table->string('situcion')->nullable();
            $table->integer('avance_fisico')->nullable();
            $table->integer('avance_tecnico')->nullable();
            $table->integer('avance_economico')->nullable();
            $table->integer('anticipo_porcentaje')->nullable();
            $table->date('acta_seleccion_obras')->nullable();
            $table->date('convenio_colaboracion_intancias')->nullable();
            $table->date('acta_intregracion_comite')->nullable();
            $table->date('convenio_concertacion')->nullable();
            $table->date('acta_aprobacion_autorizacion')->nullable();
            $table->date('acta_excepcion_licitacion')->nullable();
            $table->unsignedBigInteger('fuente_financiamiento_cliente_id')->nullable();
            $table->foreign('fuente_financiamiento_cliente_id')->references('id_fuente_financ_cliente')->on('fuentes_clientes');
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
        Schema::dropIfExists('obras');
    }
}
