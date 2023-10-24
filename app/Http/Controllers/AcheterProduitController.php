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
    public function index(){
        $produits =  Produit::orderBy('nom', 'asc')->get();
        return view('produits.acheter-produit',compact('produits'));
    }
    public function acheterProduit() {
        $produits = Produit::orderBy('nom', 'asc')->with('fournisseur')->get();
        
        return view('produits.acheter-produit', compact('produits'));
    }
    public function rechercherProduit(Request $request)
    {
        $recherche = $request->input('nom_produit');

        $produits = Produit::where('nom', 'LIKE', '%' . $recherche . '%')
            ->orderBy('nom', 'asc')
            ->with('fournisseur')
            ->get();

        return view('produits.acheter-produit', compact('produits', 'recherche'));
    }

    
}
