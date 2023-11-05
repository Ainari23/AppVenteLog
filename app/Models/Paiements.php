<?php

namespace App\Models;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiements extends Model
{
    protected $fillable = [
        'commande_id',
        'montant_paye',
        'date_paiement',
        'methode_paiement'
    ];
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}
