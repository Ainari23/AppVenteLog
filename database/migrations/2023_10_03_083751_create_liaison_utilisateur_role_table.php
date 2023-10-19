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
        Schema::create('liaison_utilisateur_role', function (Blueprint $table) {
            $table->id(); // Colonne ID de liaison (clé primaire)
            $table->unsignedBigInteger('utilisateur_id'); // Colonne ID de l'utilisateur (clé étrangère)
            $table->unsignedBigInteger('role_id'); // Colonne ID du rôle (clé étrangère)

            // Définition des clés étrangères
            $table->foreign('utilisateur_id')->references('id')->on('utilisateur');
            $table->foreign('role_id')->references('id')->on('droits_vendeur');

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liaison_utilisateur_role');
    }
};
