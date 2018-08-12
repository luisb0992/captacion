<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = array(
    			array('name' => 'desistio'),
    			array('name' => 'concretado'),
    			array('name' => 'activo')
        );
        
  		\DB::table('status')->insert($status);
    }
}
