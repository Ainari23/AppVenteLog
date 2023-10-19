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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom');// Nom de l'entreprise
            $table->string('adresse');// Adresse de l'entreprise
            $table->string('email')->unique();// Adresse e-mail de l'entreprise (unique)
            $table->string('telephone');// Numéro de téléphone de l'entreprise
            $table->text('description')->nullable();
            $table->string('pays')->nullable();
            $table->string('logo')->nullable();
            $table->string('site_web')->nullable();
            $table->boolean('statut_approval')->default(false); // Statut d'approbation :  processus d'approbation pour les entreprises avant qu'elles ne puissent vendre sur la plateforme
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
