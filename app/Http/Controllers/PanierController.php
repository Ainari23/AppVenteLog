<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit; 
use App\Models\ElementPanier;

class PanierController extends Controller
{   
    
    public function index()
    {
        $produits = Produit::all();
        return view('/produits/acheter-produit', compact('produits'));
    }
 
    public function panier()
    {
        return view('/produits.panier');
    }
    public function addToCart($id)
    {
        $produit = Produit::findOrFail($id);
 
        $panier = session()->get('panier', []);
 
        if(isset($panier[$id])) {
            $panier[$id]['quantite']++;
        }  else {
            $panier[$id] = [
                "user_id" => $produit->user_id,
                "produit_id	" => $produit->produit_id,
                "prix_unitaire" => $produit->prix_unitaire,
                "quantite" => 1,
                "prix_total" => $produit->prix_total,
                
            ];
        }
 
        session()->put('panier', $panier);
        return redirect()->back()->with('success', 'Produit ajouter avec succes');
    }
 
    public function update(Request $request)
    {
        if($request->id && $request->quantite){
            $panier = session()->get('panier');
            $panier[$request->id]["quantite"] = $request->quantite;
            session()->put('panier', $panier);
            session()->flash('success', 'Panier Mise a Jour');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $panier = session()->get('panier');
            if(isset($panier[$request->id])) {
                unset($panier[$request->id]);
                session()->put('panier', $panier);
            }
            session()->flash('success', 'Produit retirer avec succes');
        }
    }
    public function envoyerAuVendeur(Request $request)
    {
        $elementsDuPanier = $request->input('elementsDuPanier');
        if (is_array($elementsDuPanier) && !empty($elementsDuPanier)) {
        // Parcourez les éléments du panier et enregistrez-les dans la base de données
        foreach ($elementsDuPanier as $id => $details) {
            // Assurez-vous d'ajuster cette logique en fonction de votre modèle de données
            $nouvelElement = new ElementPanier();
            $nouvelElement->user_id = auth()->user()->id; // Vous devrez ajuster cela en fonction de votre gestion de l'authentification des utilisateurs.
            $produitId = $id;
            if (isset($details['quantite'])) {
            $nouvelElement->produit_id = $produitId;
            $nouvelElement->quantite = $details['quantite'];
            $nouvelElement->prix_total = $details['prix_unitaire'] * $details['quantite'];
            $nouvelElement->save();
            
        } else {
            Log::error('Les données du panier sont incomplètes pour l\'élément avec l\'ID ' . $produitId);
    }
        }
        // Redirigez l'utilisateur ou effectuez d'autres actions selon vos besoins
        return redirect()->route('produits.panier')->with('success', 'Les éléments ont été enregistrés et envoyés au vendeur.');
}}}