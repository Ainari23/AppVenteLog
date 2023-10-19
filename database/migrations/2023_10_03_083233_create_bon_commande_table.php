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
        Schema::create('bon_commande', function (Blueprint $table) {
            $table->id(); // Colonne ID du bon de commande (clé primaire)
            $table->date('date_bon_commande'); // Colonne Date du bon de commande
            $table->unsignedBigInteger('fournisseur_id'); // Colonne ID du fournisseur (clé étrangère)
            $table->string('etat'); // Colonne État du bon de commande (en attente, expédié, annulé, etc.)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Définition de la clé étrangère
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_commande');
    }
};
