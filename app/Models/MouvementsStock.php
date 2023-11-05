<?php

namespace App\Models;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouvementsStock extends Model
{
    protected $fillable = [
        'type_mouvement',
        'produit_id',
        'quantite_affectee',
        'date_mouvement',
        'emplacement'
    ];
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
