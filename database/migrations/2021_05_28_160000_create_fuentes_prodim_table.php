<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuentesProdimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuentes_prodim', function (Blueprint $table) {
            $table->id('id_fuente_prodim');
            $table->unsignedBigInteger('prodim_id');
            $table->foreign('prodim_id')->references('id_prodim')->on('prodim_catalogo');
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
        Schema::dropIfExists('fuentes_prodim');
    }
}
