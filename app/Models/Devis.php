<?php

namespace App\Models;
use App\Models\Clients;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = [
        'date_devis',
        'client_id',
        'utilisateur_id',
        'etat',
    ];
    public function clients()
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}
