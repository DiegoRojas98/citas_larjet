<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',65);
            $table->string('identidad',25)->unique();
            $table->string('password');
            $table->string('passwordHelper')->nullable();
            $table->integer('rol_id');
            $table->integer('estado_id');
            $table->integer('tipo_identidad_id');
            $table->integer('ciudad_id');
            /* datos solo Asesores */
            $table->integer('experiencia')->nullable();
            $table->integer('especialidad')->nullable();
            $table->integer('horaInicio')->nullable();
            $table->integer('horaFinal')->nullable();
            
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
        Schema::dropIfExists('usuarios');
    }
};
