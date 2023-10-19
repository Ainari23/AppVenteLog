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
        Schema::create('modes_paiement', function (Blueprint $table) {
            $table->id(); // Colonne ID du mode de paiement (clé primaire)
            $table->string('nom_mode_paiement'); // Colonne Nom du mode de paiement (par exemple, "carte de crédit")
            $table->text('informations_supplementaires')->nullable(); // Colonne Informations supplémentaires sur le mode de paiement (peut être nullable)

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modes_paiement');
    }
};
