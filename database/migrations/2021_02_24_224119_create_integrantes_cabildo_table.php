<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrantesCabildoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes_cabildo', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('cargo');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('rfc')->nullable();
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id_municipio')->on('municipios');
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
        Schema::dropIfExists('integrantes_cabildo');
    }
}
