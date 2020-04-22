<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements('id_expediente');
            $table->string('nombre')->default('');
            $table->string('apellido')->default('');
            $table->longtext('direccion')->nullable();
            $table->double('costo_tratamiento', 10, 2)->default('0.00');
            $table->double('prima_inicial', 10,2)->default('0.00');

            $table->string('edad')->default('');
            $table->string('encargado')->nullable();
            $table->double('telefono')->default(504);
            $table->string('sexo')->default('');
            $table->date('fecha_inicio')->default(now());
            $table->string('higiene')->default('');
            $table->string('actividad_cariogenica')->default('');
            $table->string('habitos')->default('');

            $table->json('dentpersuperiorizquierda')->nullable(); $table->json('dentpersuperiorderecha')->nullable();
            $table->json('dentperinferiorizquierda')->nullable(); $table->json('dentperinferiorderecha')->nullable();

            $table->json('denttemsuperiorizquierda')->nullable(); $table->json('denttemsuperiorderecha')->nullable();

            $table->json('dentteminferiorizquierda')->nullable(); $table->json('dentteminferiorderecha')->nullable();

            //
            $table->longtext('extraccion_indicada')->nullable();
            $table->longtext('cirugia_impacto')->nullable();

            $table->json('dentdetalles')->nullable();

            $table->string('arcada_superior')->default('');
            $table->string('arcada_inferior')->default('');

            $table->string('tipo_mordida')->default('');
            $table->integer('duracion_tratamiento')->default(0);

            $table->json('relacionmolar')->nullable();
            $table->json('relacioncanino')->nullable();

            $table->longtext('antecedente_familiar')->nullable();


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
        Schema::dropIfExists('expedientes');
    }
}
