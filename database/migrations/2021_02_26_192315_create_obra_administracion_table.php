<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObraAdministracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obra_administracion', function (Blueprint $table) {
            $table->id('id_obra_administracion');
            $table->integer('inventario_maquinaria_construccion');
            $table->integer('indentificacion_oficial_trabajadores');
            $table->integer('reporte_fotografico');
            $table->integer('notas_bitacora');
            $table->integer('acta_entrega_municipio');
            $table->integer('cedula_detallada_facturacion');
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
        Schema::dropIfExists('obra_administracion');
    }
}
