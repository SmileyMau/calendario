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
        Schema::create('sesiones', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('id_grupo')->unsigned()->notNull();
            $table->date('fecha')->notNull();
            $table->string('descripcion')->notNull();
            $table->string('objetivo')->notNull();
            $table->string('numero')->notNull();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesiones');
    }
};
