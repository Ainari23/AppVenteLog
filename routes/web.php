<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AcheterProduitController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\VendeursController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [ProduitController::class, 'index'])->name('produits.index');

Route::get('/roles', function () {
    return view('roles');
});
Route::get('/confirmation', function () {
    return view('confirmation');
});
Route::get('/ajouter-entreprise', function () {
    return view('ajouter-entreprise');
});
Route::get('/ajouter-fournisseur', function () {
    return view('ajouter-fournisseur');
});
//fournisseurs
Route::get('/ajouter-fournisseur', [FournisseurController::class,'create'])->name('fournisseurs.create');
Route::post('/ajouter-fournisseur', [FournisseurController::class,'store'])->name('fournisseurs.store');




//AuthSession
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::delete('/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('/login',[AuthController::class,'doLogin']);


//Gestion Utilisateurs
Route::get('/attribuer-role-admin', [RolesController::class, 'AttribuerRoleAdmin']);
Route::get('/attribuer-role-fournisseur', [RolesController::class, 'AttribuerRoleFournisseur']);
Route::get('/attribuer-role-gestionnaire-stock', [RolesController::class, 'AttribuerRoleGestionnaireStock']);
Route::get('/attribuer-role-vendeur', [RolesController::class, 'AttribuerRoleVendeur']);
Route::get('/attribuer-role-employe', [RolesController::class, 'AttribuerRoleEmploye']);

Route::get('/creer-utilisateur', [UtilisateurController::class, 'afficherFormulaire'])->name('utilisateur.creer');
Route::post('/creer-utilisateur',[UtilisateurController::class, 'creerUtilisateur'] );


Route::post('/attribuer-role-admin', [RolesController::class, 'attribuerRoleAdmin']);
Route::post('/attribuer-role-fournisseur', [RolesController::class, 'attribuerRoleFournisseur']);
Route::post('/attribuer-role-gestionnaire-stock', [RolesController::class, 'attribuerRoleGestionnaireStock']);
Route::post('/attribuer-role-vendeur', [RolesController::class, 'attribuerRoleVendeur']);
Route::post('/attribuer-role-employe', [RolesController::class, 'attribuerRoleEmploye']);

//Entreprise

Route::get('/entreprises/create', [EntrepriseController::class, 'create'])->name('entreprises.create');
Route::post('/entreprises', [EntrepriseController::class, 'store'])->name('entreprises.store');

//Produits
Route::get('/ajouter-produit', [ProduitController::class, 'create'])->name('produit.create');
Route::post('/ajouter-produit', [ProduitController::class, 'store'])->name('produit.store');
//Route pour afficher les produits
Route::get('/produits/acheter-produit', [AcheterProduitController::class, 'acheterProduit'])->name('produits.acheter-produit');



Route::get('/produits/index', [PanierController::class, 'index']);
Route::get('panier', [PanierController::class, 'panier'])->name('panier');
Route::get('ajouter-au-panier/{id}', [PanierController::class, 'addToCart'])->name('ajouter-au-panier');
Route::patch('modifier-panier', [PanierController::class, 'update'])->name('modifier-panier');
Route::delete('supprimer-du-panier', [PanierController::class, 'remove'])->name('supprimer-du-panier');
Route::get('supprimer-du-panier', [PanierController::class, 'remove'])->name('supprimer-du-panier');
Route::get('/produits/panier', [PanierController::class, 'envoyerAuVendeur'])->name('produits.panier');

//Page Vendeurs
Route::get('/vendeur/index', [VendeursController::class, 'index']);
Route::get('/vendeur/index', [VendeursController::class, 'ListeProduit'])->name('vendeur.index');
Route::post('/envoyer-au-vendeur', [PanierController::class, 'envoyerAuVendeur'])->name('envoyer-au-vendeur');
//VENDEURS DEVIS
Route::get('/vendeur/index', [VendeursController::class, 'afficherDerniersElementsDuPanier'])->name('vendeur.index');
Route::resource('produits',ProduitController::class);

