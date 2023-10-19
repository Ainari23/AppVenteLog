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
        Schema::create('bon_livraison', function (Blueprint $table) {
            $table->id(); // Colonne ID du bon de livraison (clé primaire)
            $table->date('date'); // Colonne Date du bon de livraison
            $table->unsignedBigInteger('commande_id'); // Colonne ID de la commande (clé étrangère)
            $table->string('etat'); // Colonne État du bon de livraison (expédié, en attente, etc.)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Définition de la clé étrangère
            $table->foreign('commande_id')->references('id')->on('commandes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_livraison');
    }
};
