@extends('layout')
    
@section('content')
<h1>Liste des Produits</h1>
<!-- Connection -->
<ul>
    @auth
    {{ \Illuminate\Support\Facades\Auth::user()->name }}
    <form class="nav-item" action="{{ route('auth.logout') }}" method="POST">
        @method('delete')
        @csrf
        <button class="nav-link">Se déconnecter</button>
    </form>
    @endauth
    @guest
    <a href="{{ route('auth.login') }}">Se connecter</a>
    @endguest

    <!-- Afficher mes produits -->
    <div class="row">
        @foreach ($produits as $produit)
            <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                <div class="caption">
                        <li> {{ $produit->nom }}
                            <br>- {{ $produit->description }}
                            <br>- {{ $produit->code_categorie }}
                            <br>- Vendu par le fournisseur : {{ $produit->fournisseur->nom }}
                            <br>- Prix Unitaire : {{ $produit->prix_unitaire }} €
                            <p class="btn-holder"><a href="{{ route('ajouter-au-panier', $produit->id) }}" class="btn btn-primary btn-block text-center" role="button">Ajouter au panier</a> </p>
                </div>
            </div>
        </div> 
        @endforeach
    </div>
</ul>
@endsection 