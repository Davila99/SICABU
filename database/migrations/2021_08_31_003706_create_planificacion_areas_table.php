<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificacionAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificacion_areas', function (Blueprint $table) {
            $table->id();
            // $table->integer('estudiante_id')->foreign('estudiante_id')
            // ->references('id')->on('estudiantes')
            // ->onDelete('set null');
            // $table->integer('area_id')->foreign('area_id')
            // ->references('id')->on('areas')
            // ->onDelete('set null');
            // $table->string('fecha_inicio');
            // $table->string('fecha_fin');
            // $table->string('dias');
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
        Schema::dropIfExists('planificacion_areas');
    }
}
