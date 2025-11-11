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
        Schema::create('responsables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_acuerdo')->unsigned()->notNull();
            $table->integer('id_usuario')->unsigned()->notNull();
            $table->string('estatus');
            $table->timestamps();
            $table->foreign('id_acuerdo')->references('id')->on('acuerdos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
             $table->foreign('id_usuario')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsables');
    }
};
