<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_factura', function (Blueprint $table) {
            $table->unsignedBigInteger('factura_id');
            $table->foreign('factura_id')->references('id_factura')->on('factura');
            $table->unsignedBigInteger('contrato_arrendamiento_id');
            $table->foreign('contrato_arrendamiento_id')->references('id_contrato_arrendamiento')->on('contrato_arrendamiento');
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
        Schema::dropIfExists('contrato_factura');
    }
}
