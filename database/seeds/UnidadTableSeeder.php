<?php

use Illuminate\Database\Seeder;

class UnidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = array(
			  			array(
			  				'id' => '1',
			  				'name' => 'SOLES'),
			  			array(
			  				'id' => '2',
			  				'name' => 'USD')
			  		);

  		\DB::table('unidades')->insert($unidades);
    }
}
