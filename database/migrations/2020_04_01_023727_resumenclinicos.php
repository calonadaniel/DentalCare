<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Resumenclinicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumenclinicos', function (Blueprint $table) {
        $table->bigIncrements('id_resumen');
        $table->bigInteger('id_expediente')->default('0');
        $table->date('fecha')->default(now());
        $table->longtext('detalles')->nullable();
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
        Schema::dropIfExists('resumenclinicos');
    }
}
