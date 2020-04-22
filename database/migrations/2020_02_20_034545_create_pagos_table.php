<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            
            $table->bigIncrements('id_pago');
            $table->bigInteger('id_expediente')->default('0');
            $table->date('fecha')->default(now());
            $table->double('cuota', 10, 2)->default('0.00');
            $table->double('saldo', 10, 2)->default('0.00');
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
        Schema::dropIfExists('pagos');
    }
}
