<?php

namespace App\Models;
use App\Models\BonCommande;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsBonCommande extends Model
{
    protected $fillable = [
        'bon_commande_id',
        'produit_id',
        'quantite_commandee',
        'prix_unitaire',
        'montant_total'
    ];
    public function bon_commande()
    {
        return $this->belongsTo(BonCommande::class, 'bon_commande_id');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
