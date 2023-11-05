<?php

namespace App\Models;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonCommande extends Model
{
    protected $fillable = [
        'date_bon_commande',
        'fournisseur_id',
        'etat'
    ];
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    } 
}
