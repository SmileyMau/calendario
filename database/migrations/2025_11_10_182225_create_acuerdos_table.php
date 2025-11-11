<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acuerdos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sesion')->unsigned()->notNull();
            //$table->integer('id_responsable')->unsigned()->notNull();
            $table->date('fecha_limite');
            $table->integer('num_acuerdo');
            $table->string('estatus');
            $table->string('nomenclatura');
            $table->timestamps();
            $table->foreign('id_sesion')->references('id')->on('sesiones')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            /* $table->foreign('id_responsable')->references('id')->on('responsables')
            ->onDelete('cascade')
            ->onUpdate('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acuerdos');
    }
};
