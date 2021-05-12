<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicitacionInvitacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacion_invitacion', function (Blueprint $table) {
            $table->id();
            $table->integer('padron_contratistas')->nullable();
            $table->integer('bases_licitacion')->nullable();
            $table->integer('constancia_visita')->nullable();
            $table->integer('acta_junta_aclaraciones')->nullable();
            $table->integer('acta_apertura_tecnica')->nullable();
            $table->integer('dictamen_tecnico')->nullable();
            $table->integer('acta_apertura_economica')->nullable();
            $table->integer('dictamen_economico')->nullable();
            $table->integer('dictamen')->nullable();
            $table->integer('acta_fallo')->nullable();
            $table->integer('propuesta_licitantes_economica')->nullable();
            $table->integer('propuesta_licitantes_tecnica')->nullable();
            $table->unsignedBigInteger('obra_contrato_id')->nullable();
            $table->foreign('obra_contrato_id')->references('id_obra_contrato')->on('obras_contrato');
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
        Schema::dropIfExists('licitacion_invitacion');
    }
}
