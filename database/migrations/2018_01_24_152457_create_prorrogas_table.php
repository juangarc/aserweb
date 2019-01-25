<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProrrogasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prorrogas', function (Blueprint $table) {
            $table->increments('id');
            $table->time('cantidad_dia_prorroga');
            $table->date('fechainicio');
            $table->enum('icapacidad',['PERMANENTE','PARCIAL']);
            $table->float('%incapacidad');
            $table->text('seguimiento_incapacidad',100);
            // $table->integer('id_ausentismo')->unsigned();
            // $table->foreign('id_ausentismo')->references('id')->on('ausentismos');            
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
        Schema::dropIfExists('prorrogas');
    }
}
