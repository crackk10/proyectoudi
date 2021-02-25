<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20);
            $table->string('last_name', 20);
            $table->unsignedBigInteger('tipo_usuario');
            $table->foreign('tipo_usuario','fk_usuario_tipoUsuario')->references('id')->on('tipo_usuario')->onDelete('restrict')->onUpdate('restrict');  
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',15);
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado','fk_usuario_estado')->references('id')->on('estado')->onDelete('restrict')->onUpdate('restrict');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
