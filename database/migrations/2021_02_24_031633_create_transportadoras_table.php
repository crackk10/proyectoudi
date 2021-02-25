<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportadorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportadora', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razon_social',50);
            $table->string('nit',30);
            $table->string('telefono',15);
            $table->string('direccion',50)->nullable();
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado','fk_transportadora_estado')->references('id')->on('estado')->onDelete('restrict')->onUpdate('restrict');
            $table->string('email',50)->unique()->nullable();
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
        Schema::dropIfExists('transportadora');
    }
}
