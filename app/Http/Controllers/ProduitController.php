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
        $nomProduit = $validatedData['nom'];
        $quantiteEnStock = $validatedData['quantite_en_stock'];
    
        // Vérifier si un produit avec le même nom existe déjà
        $existingProduct = Produit::where('nom', $nomProduit)->first();
    
        if ($existingProduct) {
            // Produit avec le même nom existe, mettez à jour la quantité en stock.
            $existingProduct->quantite_en_stock += $quantiteEnStock;
            $existingProduct->save();
    
            // Redirigez l'utilisateur vers la page de succès ou autre.
            return redirect()->route('ajouter-produit.create')->with('success', 'La quantité en stock a été mise à jour.');
        } else {

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
}
