<?php

namespace App\Models;
use App\Models\Devis;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsDevis extends Model
{
    protected $fillable = [
        'devis_id',
        'produit_id',
        'quantite_estimee',
        'prix_unitaire_estime',
        'montant_total'	
    ];
    public function devis()
    {
        return $this->belongsTo(Devis::class, 'devis_id');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
