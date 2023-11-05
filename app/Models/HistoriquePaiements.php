<?php

namespace App\Models;
use App\Models\Paiements;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriquePaiements extends Model
{
    protected $fillable = [
        'paiement_id',
        'commande_id',
        'montant_paye',
        'date_paiement'
    ];
    public function paiements()
    {
        return $this->belongsTo(Paiements::class, 'paiement_id');
    }
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}
