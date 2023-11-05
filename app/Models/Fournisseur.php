<?php

namespace App\Models;
use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
    'nom',
    'adresse',
    'telephone',
    'email',
];
    public function entreprise()
{
    return $this->belongsTo(Entreprise::class, 'entreprise_id');
}
}
