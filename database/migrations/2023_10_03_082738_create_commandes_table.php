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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id(); // Colonne ID de la commande (clé primaire)
            $table->date('date_commande'); // Colonne Date de la commande
            $table->unsignedBigInteger('fournisseur_id'); // Clé étrangère liée à la table des fournisseurs

            // Définition de la clé étrangère
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
