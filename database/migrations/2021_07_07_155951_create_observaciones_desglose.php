<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacionesDesglose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones_desglose', function (Blueprint $table) {
            $table->id('id_observaciones_desglose');
            $table->unsignedBiginteger('desglose_pagos_id')->nullable();
            $table->foreign('desglose_pagos_id')
                    ->references('id_desglose_pagos')
                    ->on('desglose_pagos_obra');
            $table->date('fecha_observaciones');
            $table->date('fecha_solventacion');
            $table->integer('estado_observaciones');
            $table->integer('estado_solventacion');
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
        Schema::dropIfExists('observaciones_desglose');
    }
}
