<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementPanier extends Model
{
    use HasFactory;
    protected $table = 'element_paniers';
    protected $fillable = [
        'user_id', 'produit_id', 'quantite', 'prix_total'
    ];
    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}