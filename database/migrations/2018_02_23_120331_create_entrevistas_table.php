<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrevistasTable extends Migration
{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
				Schema::create('prospectos', function (Blueprint $table) {
						$table->increments('id');

						$table->string('codigo')->nullable();
						$table->string('titulo')->nullable();
						$table->text('descripcion')->nullable();

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
						$table->string('precio_des')->nullable();
						$table->string('precio_sol')->nullable();
						$table->string('precio_dol')->nullable();
						$table->string('metros_con')->nullable();
						$table->string('metros_tot')->nullable();
						$table->text('direccion')->nullable();
						$table->text('codigo_postal')->nullable();
						$table->string('opcion')->nullable();

						$table->integer('status_id')->unsigned();
						$table->foreign('status_id')
            			               ->references('id')
                                       ->on('status')
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
				Schema::dropIfExists('prospectos');
		}
}
