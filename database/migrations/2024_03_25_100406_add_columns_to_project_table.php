<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /*
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projetos', function (Blueprint $table) {
            $table->double('orcamento')->after('supervisor_id');
            $table->string('tempoPrevisto')->after('orcamento');
            $table->string('tempoInvestido')->after('tempoPrevisto');
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projetos', function (Blueprint $table) {
            $table->dropColumn('orcamento');
            $table->dropColumn('tempoPrevisto');
            $table->dropColumn('tempoInvestido');
        });
    }
};
