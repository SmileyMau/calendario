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
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo')->unsigned()->notNull();
            $table->string('descripcion');
            $table->string('status');
            $table->string('observacion');
            $table->timestamps();

            $table->foreign('id_tipo')->references('id')->on('tipo_grupos')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
