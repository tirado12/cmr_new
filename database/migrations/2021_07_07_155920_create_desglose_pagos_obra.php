<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesglosePagosObra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desglose_pagos_obra', function (Blueprint $table) {
            $table->id('id_desglose_pagos');
            $table->unsignedBiginteger('obras_id')->nullable();
            $table->foreign('obras_id')
                    ->references('id_obra')
                    ->on('obras');
            $table->date('fecha_recepcion');
            $table->date('fecha_validacion');
            $table->date('fecha_pago');
            $table->string('nombre');
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
        Schema::dropIfExists('desglose_pagos_obra');
    }
}
