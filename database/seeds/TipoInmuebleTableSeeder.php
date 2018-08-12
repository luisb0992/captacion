<?php

use Illuminate\Database\Seeder;

class TipoInmuebleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_inmuebles = array(
  			array(
  				'name' => 'Departamento',
  				'categoria' => 'Residencial'),
  			array(
	          	'name' => 'Habitacion',
	          	'categoria' => 'Residencial'),
	        array(
	  			'name' => 'Casa',
	  			'categoria' => 'Residencial'),
	        array(
	  			'name' => 'Terreno/lote',
	  			'categoria' => 'Residencial'),
	        array(
	  			'name' => 'Casa de playa',
	  			'categoria' => 'Residencial'),
	        array(
	  			'name' => 'Casa de campo',
	  			'categoria' => 'Residencial'),
	        array(
	  			'name' => 'Otro',
	  			'categoria' => 'Residencial'),
	        array(
	  			'name' => 'Local comercial',
	  			'categoria' => 'Comercial'),
	        array(
	  			'name' => 'Local industrial',
	  			'categoria' => 'Comercial'),
	        array(
	  			'name' => 'Oficina',
	  			'categoria' => 'Comercial'),
	        array(
	  			'name' => 'Terreno agricola',
	  			'categoria' => 'Industrial'),
	  		);

  		\DB::table('tipos_inmuebles')->insert($tipos_inmuebles);
    }
}
