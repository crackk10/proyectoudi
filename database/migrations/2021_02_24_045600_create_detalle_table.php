<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_movimiento');
            $table->foreign('id_movimiento','fk_detalle_movimiento')->references('id')->on('movimiento')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_proceso');
            $table->foreign('id_proceso','fk_detalle_proceso')->references('id')->on('proceso')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto','fk_detalle_producto')->references('id')->on('producto')->onDelete('restrict')->onUpdate('restrict');
            $table->Integer('cantidad_producto');
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
        Schema::dropIfExists('detalle');
    }
}
