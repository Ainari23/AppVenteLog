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
        Schema::create('produit', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description')->nullable();
            $table->decimal('prix_unitaire', 10, 2);
            $table->integer('quantite_en_stock')->default(0);
            $table->string('code_categorie');
            $table->unsignedBigInteger('fournisseur_id');
            $table->timestamps();

            // Définir la clé étrangère pour la colonne fournisseur_id
            $table->foreign('fournisseur_id')
                  ->references('id')
                  ->on('fournisseurs')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
