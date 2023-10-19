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
        Schema::create('details_devis', function (Blueprint $table) {
            $table->id(); // Colonne ID de la ligne du devis (clé primaire)
            $table->unsignedBigInteger('devis_id'); // Colonne ID du devis (clé étrangère)
            $table->unsignedBigInteger('produit_id'); // Colonne ID du produit (clé étrangère)
            $table->integer('quantite_estimee'); // Colonne Quantité estimée
            $table->decimal('prix_unitaire_estime', 10, 2); // Colonne Prix unitaire estimé (chiffres entiers 10 chiffres, 2 décimales)
            $table->decimal('montant_total', 10, 2); // Colonne Montant total de la ligne du devis (chiffres entiers 10 chiffres, 2 décimales)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Définition des clés étrangères
            $table->foreign('devis_id')->references('id')->on('devis');
            $table->foreign('produit_id')->references('id')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_devis');
    }
};
