<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Produit; 
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProduitController extends Controller
{
    protected $table = 'produit';
    public function index(): View{
        $email = 'iantsa.nyaina22@gmail.com';
        if (!User::where('email', $email)->exists()) {
            User::create([
                'name' => 'Iantsa',
                'email' => $email,
                'password' => Hash::make('0000')
            ]);
        }
        $produits = Produit::with('fournisseur')->get(); // Récupérer la liste des produits depuis la base de données
        return view('produits.index', compact('produits'));
    }
    
    public function create()
    {
        $fournisseurs = Fournisseur::all(); // Récupérez la liste des fournisseurs
        return view('ajouter-produit', compact('fournisseurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix_unitaire' => 'required|numeric',
            'quantite_en_stock' => 'required|integer',
            'code_categorie' => 'required|string|max:255',
            'fournisseur_id' => 'required|exists:fournisseurs,id', 
        ]);

        // Recherchez un produit identique pour le même fournisseur
        $produitExistant = Produit::where('nom', $request->input('nom'))
            ->where('fournisseur_id', $request->input('fournisseur_id'))
            ->first();

        if ($produitExistant) {
            // Si un produit identique existe, mettez à jour la quantité en stock
            $produitExistant->quantite_en_stock += $request->input('quantite_en_stock');
            $produitExistant->save();
        } else {
            // Sinon, créez un nouveau produit
            $produit = new Produit($request->request);

            // Assurez-vous que $request->input('fournisseur_id') contient une valeur valide
            if ($request->input('fournisseur_id')) {
                // Récupérer l'ID de l'entreprise associée au fournisseur
                $fournisseur = Fournisseur::find($request->input('fournisseur_id'));
                if ($fournisseur) {
                    $entrepriseId = $fournisseur->entreprise_id;
                }
            }

            $produit->save();
        }

        return redirect()->route('produit.create')->with('success', 'Produit ajouté avec succès');
    }
}
