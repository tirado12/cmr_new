<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasFuente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_fuentes', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('fuente_financiamiento_cliente_id')->nullable();
            $table->foreign('fuente_financiamiento_cliente_id')->references('id_fuente_financ_cliente')->on('fuentes_clientes');
            $table->unsignedBigInteger('obra_id');
            $table->foreign('obra_id')->references('id_obra')->on('obras');
            $table->double('monto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obras_fuente');
    }
}
