<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieProduitController;
use App\Http\Controllers\ListeCategorieController;
use App\Http\Controllers\AcheterProduitController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\EntrepriseListeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\VendeursController;

//Models
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Entreprise;
use App\Models\DroitVendeur;
use App\Models\DetailsCommande;
use App\Models\ElementPanier;
use App\Models\Panier;
use App\Models\Role;
use App\Models\User;
use App\Models\utilisateur;
use App\Models\CategorieProduit;
use App\Models\AutorisationConsultationStock;
use App\Models\AutorisationMvmtStock;
use App\Models\BonCommande;
use App\Models\BonLivraison;
use App\Models\Commande;
use App\Models\DetailsBonCommande;
use App\Models\DetailsBonLivraison;
use App\Models\DetailsDevis;
use App\Models\Devis;
use App\Models\DroitsUtilisateur;
use App\Models\EntrepriseUtilisateur;
use App\Models\Facture;
use App\Models\Factures;
use App\Models\HistoriquePaiements;
use App\Models\HistoriquePrix;
use App\Models\HistoriqueRemboursements;
use App\Models\LiaisonUtilisateurAutorisation;
use App\Models\LiaisonUtilisateurRole;
use App\Models\ModesPaiement;
use App\Models\MouvementsStock;
use App\Models\Paiements;
use App\Models\Vendeur;


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
Route::get('/',function(){
    return view('home');
});

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
Route::get('/produits/acheter-produit');
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
Route::resource('ajouter-entreprise','App\Http\Controllers\EntrepriseController')->names([
    'index' =>  'entreprises.index',
    'create' => 'entreprises.create',
    'store' => 'entreprises.store',
]);
//Afficher Entreprise
Route::resource('/entreprises/liste-entreprise','App\Http\Controllers\EntrepriseListeController')->names([
    'index' =>  'liste-entreprise.index',

]);




//ajouter produit
Route::resource('ajouter-produit', 'App\Http\Controllers\ProduitController')->names([
    'index' =>  'ajouter-produit.index',
    'create' => 'ajouter-produit.create',
    'store' => 'ajouter-produit.store',
    ]);
//Route pour afficher les produits dans un tableau
Route::resource('/produits/acheter-produit','App\Http\Controllers\AcheterProduitController')->names([
    'acheterProduit' => 'acheter-produit.acheterProduit',
    'rechercherProduit'=> 'acheter-produit.rechercherProduit',
]);

//Route ajouter catégorie produit
Route::resource('/ajouter-catégorie-produit','App\Http\Controllers\CategorieProduitController')->names([
    'index' => 'ajouter-catégorie-produit.index',
]);
//Route liste catégorie produit
Route::resource('/produits/catégorie-produit','App\Http\Controllers\ListeCategorieController')->names([
    'index' => 'categorie-produit.index',
    'show' => 'categorie-produit.show',
    'edit' => 'categorie-produit.edit',
    'delete' => 'categorie-produit.destroy'
]);

//Route pour rechercher un produits
Route::get('/rechercherProduit',[AcheterProduitController::class,'rechercherProduit'])->name('acheter-produit.rechercherProduit');





//AuthSession
Route::get('/produits/acheter-produit',[AcheterProduitController::class,'index'])->name('produits.acheter-produit.acheterProduit');
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::delete('/logout',[AuthController::class,'logout'])->name('auth.logout');
Route::post('/login',[AuthController::class,'doLogin']);



/*
Route::resource('/produits/acheter-produit', 'App\Http\Controllers\PanierController')->names([
    'index' =>  'index.index',
    'panier' => 'ajouter-produit.panier',
    'addToCart' => 'ajouter-au-panier.addToCart',
    'update' => 'modifier-panier.update',
    'remove' => 'supprimer-du-panier.remove',
    'remove' => 'supprimer-du-panier',
    'envoyerAuVendeur' => 'produits.panier',
    ]);
*/
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

Route::get('/dashboard',function(){
    return view('dashboard');
});

//Route::resource des Differents Models 
//Route::resource('NomModels',Controller::class);
 Route::resource('fournisseur',Fournisseur::class);
 Route::resource('produit',Produit::class);
 Route::resource('entreprises',Entreprise::class);
 Route::resource('droits_vendeur',DroitVendeur::class);
 Route::resource('details_commandes',DetailsCommande::class);
 Route::resource('panier',Panier::class);
 Route::resource('roles',Role::class);
 Route::resource('utilisateur',utilisateur::class);
 Route::resource('categories_produits',CategorieProduit::class);
 Route::resource('autorisation_consultation_stock',AutorisationConsultationStock::class);
 Route::resource('autorisation_mvmt_stock',AutorisationMvmtStock::class);
 Route::resource('bon_commande',BonCommande::class);
 Route::resource('bon_livraison',BonLivraison::class);
 Route::resource('categories_produits',CategorieProduit::class);
 Route::resource('clients',clients::class);
 Route::resource('commandes',commandes::class);
 Route::resource('details_bon_commande',DetailsBonCommande::class);
 Route::resource('details_devis',DetailsDevis::class);
 Route::resource('devis',Devis::class);
 Route::resource('droits_utilisateur',DroitsUtilisateur::class);
 Route::resource('element_paniers',ElementPanier::class);
 Route::resource('entreprise_utilisateur',EntrepriseUtilisateur::class);
 Route::resource('facture',Facture::class);
 Route::resource('factures',Factures::class);
 Route::resource('historique_paiements',HistoriquePaiements::class);
 Route::resource('historique_prix',HistoriquePrix::class);
 Route::resource('historique_remboursements',HistoriqueRemboursements::class);
 Route::resource('liaison_utilisateur_autorisation',LiaisonUtilisateurAutorisation::class);
 Route::resource('liaison_utilisateur_role',LiaisonUtilisateurRole::class);
 Route::resource('modes_paiement',ModesPaiement::class);
 Route::resource('mouvements_stock',MouvementsStock::class);
 Route::resource('paiements',Paiements::class);



