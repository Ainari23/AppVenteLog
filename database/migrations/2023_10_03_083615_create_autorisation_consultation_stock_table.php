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
        Schema::create('autorisation_consultation_stock', function (Blueprint $table) {
            $table->id(); // Colonne ID de l'autorisation (clé primaire)
            $table->string('nom_autorisation'); // Colonne Nom de l'autorisation
            $table->text('description_autorisation'); // Colonne Description de l'autorisation

            $table->timestamps(); // Colonnes created_at et updated_at automatiquement gérées
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorisation_consultation_stock');
    }
};
