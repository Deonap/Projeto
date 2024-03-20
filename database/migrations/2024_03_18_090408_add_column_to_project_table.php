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
        Schema::table('projetos', function (Blueprint $table) {
            $table->enum('status', ['Por fazer', 'Em progresso', 'Feito'])->default('Por fazer')->after('obs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
