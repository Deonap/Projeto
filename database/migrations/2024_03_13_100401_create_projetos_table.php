<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('cliente_id')->nullable();
            $table->string('tipo');
            $table->date('dataLimite')->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->integer('responsavel_id')->nullable();
            $table->text('obs');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
