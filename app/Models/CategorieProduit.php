<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieProduit extends Model
{
    protected $table = 'categories_produits';
    protected $fillable = [
        'nom_categorie'	
    ];
    use HasFactory;
}
