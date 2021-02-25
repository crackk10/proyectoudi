<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transportadora');
            $table->foreign('id_transportadora','fk_vehiculos_transportadoras')->references('id')->on('transportadora')->onDelete('restrict')->onUpdate('restrict');
            $table->string('placa',10);
            $table->string('remolque',10);
            $table->float('capacidad', 16, 3); 
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
}
