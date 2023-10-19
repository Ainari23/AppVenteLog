<?php

namespace App\Http\Controllers;
use App\Models\Produit; 
use App\Models\Fournisseur;
use Illuminate\View\View;
use App\Models\ElementPanier;

use Illuminate\Http\Request;

class VendeursController extends Controller
{
    public function index(){
        return view('vendeur.index');
    }
    public function ListeProduit() {
        
        $produits = Produit::with('fournisseur')->get();
        return view('vendeur.index', ['produits' => $produits]);
    }
    public function afficherDerniersElementsDuPanier() {
        $subquery = ElementPanier::select(\DB::raw('user_id, MAX(created_at) as max_created_at'))
        ->groupBy('user_id');
        $derniersElements = \DB::table('element_paniers')->joinSub($subquery, 'max_created', function($join) {
        $join->on('element_paniers.user_id', '=', 'max_created.user_id')
             ->on('element_paniers.created_at', '=', 'max_created.max_created_at');
        })
        ->get();
        return view('vendeur.index')->with('derniersElements', $derniersElements);
    }
}
