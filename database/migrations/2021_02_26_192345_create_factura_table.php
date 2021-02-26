<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->string('folio_fiscal', 36);
            $table->text('concepto');
            $table->date('fecha');
            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id_proveedor')->on('proveedor');
            $table->unsignedBigInteger('obra_administracion_id');
            $table->foreign('obra_administracion_id')->references('id_obra_administracion')->on('obra_administracion');
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
        Schema::dropIfExists('factura');
    }
}
