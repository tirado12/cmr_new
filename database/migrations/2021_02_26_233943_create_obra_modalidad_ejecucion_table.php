<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObraModalidadEjecucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obra_modalidad_ejecucion', function (Blueprint $table) {
            $table->unsignedBigInteger('obra_id');
            $table->foreign('obra_id')->references('id_obra')->on('obras');
            $table->unsignedBigInteger('obra_administracion_id');
            $table->foreign('obra_administracion_id')->references('id_obra_administracion')->on('obras_administracion');
            $table->unsignedBigInteger('parte_social_tecnica_id');
            $table->foreign('parte_social_tecnica_id')->references('id_parte_social_tecnica')->on('parte_social_tecnica');
            $table->unsignedBigInteger('obra_contrato_id');
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
        Schema::dropIfExists('obra_modalidad_ejecucion');
    }
}
