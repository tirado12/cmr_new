<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParteSocialTecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_social_tecnica', function (Blueprint $table) {
            $table->id('id_parte_social_tecnica');
            $table->integer('acta_integreacion_consejo')->nullable();
            $table->integer('acta_seleccion_obras')->nullable();
            $table->integer('acta_priorizacion_obras')->nullable();
            $table->integer('convenio_mezcla')->nullable();
            $table->integer('acta_integracion_comite')->nullable();
            $table->integer('convenio_concertacion')->nullable();
            $table->integer('acta_aprobacion_obra')->nullable();
            $table->integer('acta_excep_licitacion')->nullable();
            $table->integer('estudio_factibilidad')->nullable();
            $table->integer('oficio_aprovacion_obra')->nullable();
            $table->integer('anexos_oficio_notificacion')->nullable();
            $table->integer('cedula_informacion_basica')->nullable();
            $table->integer('generalidades_inversion')->nullable();
            $table->integer('tenencia_tierra')->nullable();
            $table->integer('dictamen_impacto_ambiental')->nullable();
            $table->integer('presupuesto_obra')->nullable();
            $table->integer('generadores_obra')->nullable();
            $table->integer('planos_proyecto')->nullable();
            $table->integer('especificaciones_generales_particulares')->nullable();
            $table->integer('dro')->nullable();
            $table->integer('programa_obra_inversion')->nullable();
            $table->integer('croquis_macro')->nullable();
            $table->integer('croquis_micro')->nullable();
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
        Schema::dropIfExists('parte_social_tecnica');
    }
}
