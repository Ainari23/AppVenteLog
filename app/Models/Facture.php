<?php

namespace App\Models;
use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
        'date_facture',
        'client_id',
        'montant_total',
        'etat_facture'
    ];
    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}
