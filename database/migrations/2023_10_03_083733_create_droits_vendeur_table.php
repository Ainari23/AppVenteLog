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
        Schema::create('droits_vendeur', function (Blueprint $table) {
            $table->id(); // Colonne ID du rôle (clé primaire)
            $table->string('nom_role'); // Colonne Nom du rôle
            $table->text('description_role')->nullable(); // Colonne Description du rôle (peut être nulle)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('droits_vendeur');
    }
};
