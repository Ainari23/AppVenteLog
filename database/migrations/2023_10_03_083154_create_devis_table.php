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
        Schema::create('devis', function (Blueprint $table) {
            $table->id(); // Colonne ID du devis (clé primaire)
            $table->date('date_devis'); // Colonne Date du devis
            $table->unsignedBigInteger('client_id')->nullable(); // Colonne ID du client (clé étrangère)
            $table->unsignedBigInteger('utilisateur_id'); // Colonne ID de l'utilisateur qui a créé le devis (clé étrangère)
            $table->string('etat'); // Colonne État du devis (en attente, accepté, refusé, etc.)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

            // Définition des clés étrangères
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateur');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
