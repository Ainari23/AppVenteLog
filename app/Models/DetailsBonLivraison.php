<?php

namespace App\Models;
use App\Models\BonLivraison;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsBonLivraison extends Model
{
    protected $fillable = [
        'bon_livraison_id',
        'produit_id',
        'quantite_livree',
        'numero_suivi',
    ];
    public function bon_livraison()
    {
        return $this->belongsTo(BonLivraison::class, 'bon_livraison_id');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
