<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Produit; 
use App\Models\User;
use Illuminate\View\View;
use App\Models\Panier;
use App\Models\ElementPanier;

class AcheterProduitController extends Controller
{
    //
    public function acheterProduit() {
        
        $produits = Produit::with('fournisseur')->get();
        $elementsPanier = ElementPanier::where('user_id', auth()->id())->get();
        
        return view('produits.acheter-produit', ['produits' => $produits, 'elementsPanier' => $elementsPanier]);
    } 
}
