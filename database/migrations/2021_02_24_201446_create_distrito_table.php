<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distrito', function (Blueprint $table) {
            $table->id('id_distrito');
            $table->string('nombre', 20);
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id_region')->on('region');
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
        Schema::dropIfExists('distrito');
    }
}
