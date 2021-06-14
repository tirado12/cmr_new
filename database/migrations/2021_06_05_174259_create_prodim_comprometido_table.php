<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdimComprometidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodim_comprometido', function (Blueprint $table) {
            $table->id('id_comprometido');
            $table->unsignedBigInteger('prodim_catalogo_id');
            $table->foreign('prodim_catalogo_id')
                    ->references('id_prodim_catalogo')
                    ->on('prodim_catalogo');

            $table->unsignedBiginteger('prodim_id')->nullable();
            $table->foreign('prodim_id')
                    ->references('id_prodim')
                    ->on('prodim');
            $table->double('monto')->nullable();

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
        Schema::dropIfExists('prodim_comprometido');
    }
}
