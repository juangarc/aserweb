<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAusentismosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('ausentismos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_registro');
            $table->integer('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->integer('id_tipoausentismo')->unsigned();
            $table->foreign('id_tipoausentismo')->references('id')->on('tipoausentismos');                        
            $table->integer('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargos');    
            $table->date('fecha_inicio');
            $table->integer('tiempo_ausencia');
            $table->double('costo');
            $table->enum('Grado',['LEVE','SEVERO']);
            $table->text('observacion',100);
            $table->unique('id');

            
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
        Schema::dropIfExists('ausentismos');
    }
}
