<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            
            $table->integer('prospecto_id')->unsigned()->nullable();
            $table->foreign('prospecto_id')
                        ->references('id')
                        ->on('prospectos')
                        ->onDelete('cascade');

            $table->integer('requerimiento_id')->unsigned()->nullable();
            $table->foreign('requerimiento_id')
                        ->references('id')
                        ->on('requerimientos')
                        ->onDelete('cascade');

            $table->integer('ft_id')->unsigned()->nullable();
            $table->foreign('ft_id')
                        ->references('id')
                        ->on('futuros_clientes')
                        ->onDelete('cascade');
            
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
        Schema::dropIfExists('personas');
    }
}
