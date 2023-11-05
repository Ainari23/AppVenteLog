<?php

namespace App\Models;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueRemboursements extends Model
{
    protected $fillable = [
        'commande_id',
        'montant_rembourse',
        'date_remboursement'
    ];
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}
