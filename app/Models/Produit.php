<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produit'; // Le nom de la table dans la base de données

    protected $primaryKey = 'id'; // La clé primaire de la table

    protected $fillable = [
        'nom',
        'description',
        'prix_unitaire',
        'quantite_en_stock',
        'code_categorie',
        // Ajoutez ici d'autres colonnes si nécessaire
    ];

    // Définition des relations avec d'autres modèles, par exemple, la relation avec la table des fournisseurs
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }
    public function elementsPanier()
    {
        return $this->hasMany(ElementPanier::class);
    }
}
