<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_movimiento', 1);
            $table->string('origen', 100);
            $table->string('destino', 100);
            $table->dateTime('fecha_salida', $precision = 0);
            $table->dateTime('fecha_arribo', $precision = 0);
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario','fk_movimiento_usuario')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_calendario');
            $table->foreign('id_calendario','fk_movimiento_calendario')->references('id')->on('calendario')->onDelete('restrict')->onUpdate('restrict');
            $table->string('observaciones', 200);
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
        Schema::dropIfExists('movimiento');
    }
}
