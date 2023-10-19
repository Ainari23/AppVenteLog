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
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->unsignedBigInteger('entreprise_id'); // Colonne entreprise_id
            $table->foreign('entreprise_id')->references('id')->on('entreprises'); // Clé étrangère vers la table entreprises
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fournisseurs', function (Blueprint $table) {
            //
        });
    }
};
