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
        Schema::create('categories_produits', function (Blueprint $table) {
            $table->id(); // Colonne ID de catégorie (clé primaire)
            $table->string('nom_categorie'); // Colonne Nom de la catégorie

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_produits');
    }
};
