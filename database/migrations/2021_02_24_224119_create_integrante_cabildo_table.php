<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegranteCabildoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrante_cabildo', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('cargo');
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('rfc')->nullable();
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('clave')->on('municipio');
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
        Schema::dropIfExists('integrante_cabildo');
    }
}
