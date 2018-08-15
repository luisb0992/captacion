<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaveClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_clicks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->string('hora');
            $table->integer('red_id')->unsigned();
            $table->foreign('red_id')
                        ->references('id')
                        ->on('redes')
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
        Schema::dropIfExists('save_clicks');
    }
}
