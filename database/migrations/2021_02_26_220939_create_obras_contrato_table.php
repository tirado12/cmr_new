<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateObrasContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_contrato', function (Blueprint $table) {
            $table->id('id_obra_contrato');
            $table->string('contrato')->nullable();
            $table->integer('oficio_justificativo_convenio_modificatorio')->nullable();
            $table->integer('analisis_p_u')->nullable();
            $table->integer('catalogo_conceptos')->nullable();
            $table->integer('montos_mensuales_ejecutados')->nullable();
            $table->integer('calendario_trabajos_ejecutados')->nullable();
            $table->integer('oficio_superintendente')->nullable();
            $table->integer('oficio_residente_obra')->nullable();
            $table->integer('oficio_disposicion_inmueble')->nullable();
            $table->integer('oficio_inicio_obra')->nullable();
            $table->string('factura_anticipo')->nullable();
            $table->string('fianza_anticipo')->nullable();
            $table->string('fianza_cumplimiento')->nullable();
            $table->string('fianza_v_o')->nullable();
            $table->integer('aviso_terminacion_obra')->nullable();
            $table->integer('acta_entrega_contratista')->nullable();
            $table->integer('acta_entrega_municipio')->nullable();
            $table->integer('saba_finiquito')->nullable();
            $table->integer('notas_botacoras')->nullable();
            $table->integer('modalidad_asignacion')->nullable();
            $table->text('nombre_localidad')->nullable();
            $table->text('tipo_localidad')->nullable();
            $table->unsignedBigInteger('contratista_id')->nullable();
            $table->foreign('contratista_id')->references('id_contratista')->on('contratistas');
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
        Schema::dropIfExists('obras_contrato');
    }
}
