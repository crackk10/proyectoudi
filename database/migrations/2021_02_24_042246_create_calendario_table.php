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
            $table->dateTime('fecha_salida', $precision = 0)->nullable();
            $table->unsignedBigInteger('id_vehiculo');
            $table->foreign('id_vehiculo','fk_calendario_vehiculo')->references('id')->on('vehiculo')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_conductor');
            $table->foreign('id_conductor','fk_calendario_conductor')->references('id')->on('conductor')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado','fk_calendario_estado')->references('id')->on('estado')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario','fk_calendario_usuario')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->string('tipo_movimiento',1)->nullable();
            $table->string('origen',100)->nullable();
            $table->string('destino',100)->nullable();
            $table->string('color')->nullable($value = true)->default('#3498DB');
            $table->string('comentario',200)->nullable($value = true)->default('Sin comentarios');
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
