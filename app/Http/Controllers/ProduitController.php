<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Produit; 
use App\Models\User;
use App\Http\Requests\ProduitRequest; 
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProduitController extends Controller
{
    public function index(){
        $fournisseurs =  Fournisseur::all();
        return view('ajouter-produit',compact('fournisseurs'));
    }
    
    public function create(ProduitRequest $request)
    {
        $fournisseurs = Fournisseur::all();
        return view('ajouter-produit', compact('fournisseurs'));
    }

    public function store(ProduitRequest $request)
    {
        $validatedData = $request->validated();
        $produit = new Produit([
            'nom' => $validatedData['nom'],
            'description' => $validatedData['description'],
            'prix_unitaire' => $validatedData['prix_unitaire'],
            'quantite_en_stock' => $validatedData['quantite_en_stock'],
            'code_categorie' => $validatedData['code_categorie'],
            'fournisseur_id' => $validatedData['fournisseur_id'],
        ]);
    
        // Set a default value if 'fournisseur_id' is not provided
        if (!isset($validatedData['fournisseur_id'])) {
            $defaultFournisseurId = 1; // Remplacez cette valeur par la valeur par défaut appropriée
            $produit->fournisseur_id = $defaultFournisseurId;
        }
    
        // Sauvegarder le produit
        $produit->save();
        
        return redirect()->route('ajouter-produit.create')->with('success', 'Produit ajouté avec succès');
    }
    
}
