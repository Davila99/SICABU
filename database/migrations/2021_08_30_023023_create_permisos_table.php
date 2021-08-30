<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->integer('estudiante_id')->foreign('estudiante_id')
            ->references('id')->on('estudiantes')
            ->onDelete('set null');
            $table->string('objetivo')->nullable();
            $table->string('fecha_salida');
            $table->string('hora_salida');
            $table->string('fecha_entrada');
            $table->string('hora_entrada');
            $table->integer('user_id')->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('set null');
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
        Schema::dropIfExists('permisos');
    }
}
