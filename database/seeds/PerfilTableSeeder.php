<?php

use Illuminate\Database\Seeder;

class PerfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfiles = array(
  			array(
  				'id' => '1',
  				'name' => 'admin',
  				'observacion' => 'administrador del sistema'),
  			array(
          'id' => '2',
          'name' => 'usuario',
          'observacion' => 'empleado'),
        array(
  				'id' => '3',
  				'name' => 'futuro cliente',
  				'observacion' => 'futuro cliente'),
  		);

  		\DB::table('perfiles')->insert($perfiles);
    }
}
