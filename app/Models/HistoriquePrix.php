<?php

namespace App\Models;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriquePrix extends Model
{
    protected $fillable = [
        'produit_id',
        'date_changement_prix',
        'ancien_prix',
        'nouveau_prix'
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
