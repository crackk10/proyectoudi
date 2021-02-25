<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendario', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha', $precision = 0);
            $table->unsignedBigInteger('id_vehiculo');
            $table->foreign('id_vehiculo','fk_calendario_vehiculo')->references('id')->on('vehiculo')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_conductor');
            $table->foreign('id_conductor','fk_calendario_conductor')->references('id')->on('conductor')->onDelete('restrict')->onUpdate('restrict');
            $table->string('orden_entrada');
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
        Schema::dropIfExists('calendario');
    }
}
