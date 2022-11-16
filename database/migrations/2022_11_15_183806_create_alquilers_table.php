<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquilers', function (Blueprint $table) {
            $table->integer('id_alquiler');
            $table->string('Matricula');
            $table->string('DNI');
            $table->date('fecha_salida');
            $table->date('fecha_devuelto');
            $table->integer('precio_dia');
            $table->integer('Multa');
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
        Schema::dropIfExists('alquilers');
    }
}
