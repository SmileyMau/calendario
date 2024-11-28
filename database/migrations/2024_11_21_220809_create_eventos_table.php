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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->unsigned()->notnull();
            $table->string('titulo')->notnull();
            $table->string('descripcion')->notnull();
            $table->date('fecha_ini')->notnull();
            $table->date('fecha_fin')->notnull();
            $table->string('color')->notnull();
            $table->string('status')->notnull();

            $table->timestamps();

            
            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
