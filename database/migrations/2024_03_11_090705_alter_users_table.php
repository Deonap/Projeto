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
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->after('email_verified_at');
            $table->string('telemovel')->after('password');
            $table->enum('funcoes', ["Administrador", "Técnico"])->after('telemovel');
            $table->enum('status', ["Ativo", "Inativo"])->after('funcoes');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
