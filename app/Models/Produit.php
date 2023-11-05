<?php

namespace App\Models;
use App\Models\Fournisseur;
use App\Models\ElementPanier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'Produit';
    protected $fillable = [
        'nom',
        'description',
        'prix_unitaire',
        'quantite_en_stock',
        'code_categorie',
        'fournisseur_id',
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
