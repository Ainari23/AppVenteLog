@extends('layouts.app', [
    'namePage' => 'Produits',
    'class' => 'sidebar-mini',
    'activePage' => 'acheter-produit',
])
@section('content')
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