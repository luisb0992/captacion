<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')
                    ->references('id')
                    ->on('tipos_inmuebles')
                    ->onDelete('cascade');
            
            $table->integer('departamento_id')->unsigned()->nullable();
            $table->foreign('departamento_id')
                           ->references('id')
                           ->on('ubdepartamento')
                           ->onDelete('cascade');
            
            $table->integer('provincia_id')->unsigned()->nullable();
            $table->foreign('provincia_id')
                           ->references('id')
                           ->on('ubprovincia')
                           ->onDelete('cascade');

            $table->integer('distrito_id')->unsigned()->nullable();
            $table->foreign('distrito_id')
                           ->references('id')
                           ->on('ubdistrito')
                           ->onDelete('cascade');

            $table->string('antiguedad')->nullable();
            $table->string('dormitorios')->nullable();
            $table->string('estacionamientos')->nullable();
            $table->string('b_completos')->nullable();
            $table->string('b_medio')->nullable();
            $table->string('presupuesto')->nullable();

            $table->integer('unidad_id')->unsigned();
            $table->foreign('unidad_id')
                           ->references('id')
                           ->on('unidades')
                           ->onDelete('cascade');

            $table->string('opcion')->nullable();
            $table->string('metros_cua')->nullable();
            $table->text('referencia')->nullable();
            $table->text('comentario')->nullable();
            $table->string('status')->nullable();
            
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
        Schema::dropIfExists('requerimientos');
    }
}
