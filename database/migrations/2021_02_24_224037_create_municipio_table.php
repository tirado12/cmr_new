<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipio', function (Blueprint $table) {
            $table->id('clave');
            $table->string('nombre', 100);
            $table->string('rfc', 13)->nullable();
            $table->string ('direccion')->nullable();            
            $table->unsignedBigInteger('distrito_id');
            $table->foreign('distrito_id')->references('clave')->on('distrito');
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
        Schema::dropIfExists('municipio');
    }
}
