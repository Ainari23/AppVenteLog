<?php

namespace App\Models;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonLivraison extends Model
{
    protected $fillable = [
        'date',
        'commande_id',
        'etat'
    ];
    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    } 
}
