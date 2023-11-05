<?php

namespace App\Models;
use App\Models\User;
use App\Models\ElementPanier;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $fillable = ['user_id', 'produit_id', 'quantite', 'prix_total', 'prix_unitaire'];

    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    public function elementsPanier()
    {
        return $this->hasMany(ElementPanier::class);
    }
    public function produitAssocie()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'id');
    }
}
