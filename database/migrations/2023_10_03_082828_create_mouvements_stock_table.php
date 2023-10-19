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
        Schema::create('mouvements_stock', function (Blueprint $table) {
            $table->id(); // Colonne ID du mouvement (clé primaire)
            $table->string('type_mouvement'); // Colonne Type de mouvement (réception, expédition, ajustement, etc.)
            $table->unsignedBigInteger('produit_id'); // Clé étrangère liée à la table des produits
            $table->integer('quantite_affectee'); // Colonne Quantité affectée
            $table->date('date_mouvement'); // Colonne Date du mouvement
            $table->string('emplacement'); // Colonne Emplacement du mouvement (entrepôt, magasin, etc.)

            // Définition de la clé étrangère
            $table->foreign('produit_id')->references('id')->on('produits');

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouvements_stock');
    }
};
