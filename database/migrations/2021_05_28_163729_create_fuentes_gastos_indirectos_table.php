<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuentesGastosIndirectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuentes_gastos_indirectos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indirectos_id');
            $table->foreign('indirectos_id')->references('id_indirectos')->on('gastos_indirectos');
            $table->integer('monto')->nullable();
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
        Schema::dropIfExists('fuentes_gastos_indirectos');
    }
}
