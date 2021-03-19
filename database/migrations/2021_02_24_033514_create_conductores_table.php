<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('tipo_documento',4);
            $table->string('documento',15);
            $table->string('tipo_licencia',10);
            $table->unsignedBigInteger('id_estado_conductor');
            $table->foreign('id_estado','fk_conductores_estado')->references('id')->on('estado')->onDelete('restrict')->onUpdate('restrict');
            $table->string('telefono',15);
            $table->string('email',50)->unique()->nullable();
            $table->unsignedBigInteger('id_transportadora');
            $table->foreign('id_transportadora','fk_conductores_transportadoras')->references('id')->on('transportadora')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('conductor');
    }
}
