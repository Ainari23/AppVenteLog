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
        Schema::create('liaison_utilisateur_autorisation', function (Blueprint $table) {
            $table->id(); // Colonne ID de liaison (clé primaire)
            $table->unsignedBigInteger('utilisateur_id'); // Colonne ID de l'utilisateur (clé étrangère)
            $table->unsignedBigInteger('autorisation_id'); // Colonne ID de l'autorisation (clé étrangère)

            // Clés étrangères
            $table->foreign('utilisateur_id')->references('id')->on('utilisateur');
            $table->foreign('autorisation_id')->references('id')->on('autotisation_mvmt_stock');

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liaison_utilisateur_autorisation');
    }
};
