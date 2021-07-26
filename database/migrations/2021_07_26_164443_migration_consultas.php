<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationConsultas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('consultas', function (Blueprint $table) {
        $table->increments('id');
        $table->string('data');
        $table->string('hora');
        $table->string('convenio');
        $table->string('valor');

        $table->unsignedInteger('medicos_id');
        $table->foreign('medicos_id')->references('id')->on('medicos');
        $table->unsignedInteger('pacientes_id');
        $table->foreign('pacientes_id')->references('id')->on('pacientes');
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
      Schema::dropIfExists('consultas');
    }
}
