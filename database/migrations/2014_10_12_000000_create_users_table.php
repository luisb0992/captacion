<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido');
            $table->string('email',190)->unique();
            $table->string('password');
            $table->string('clave')->nullable();
            $table->integer('perfil_id')->unsigned();
            $table->foreign('perfil_id')->references('id')->on('perfiles');
            $table->integer('status')->unsigned();
            $table->string('online')->nullable();

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
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
