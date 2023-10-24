@extends('layouts.app', [
    'namePage' => 'Produits',
    'class' => 'sidebar-mini',
    'activePage' => 'acheter-produit',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <div class="container">
          <div class="row">
              <div class="col-lg-12 col-sm-12 col-12">
                  <div class="dropdown">
                      <button type="button" class="btn btn-primary" data-toggle="dropdown">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier <span class="badge badge-pill badge-danger">{{ count((array) session('panier')) }}</span>
                      </button>
       
                      <div class="dropdown-menu">
                          <div class="row total-header-section">
                              @php $total = 0 @endphp
                              @if(isset($details['prix_unitaire']))
                                  @php $total += $details['prix_unitaire'] * $details['quantite'] @endphp
                              @endif
      
                              <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                  <p>Total: <span class="text-info">€ {{ $total }}</span></p>
                              </div>
                          </div>
                          @if(session('panier'))
                              @foreach(session('panier') as $id => $details)
                                  <div class="row cart-detail">
                                      <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                          @if(isset($details['nom']))
                                              <p>{{ $details['nom'] }}</p>
                                          @endif
                                          @if(isset($details['prix_unitaire']))
                                              <span class="price text-info"> €{{ $details['prix_unitaire'] }}</span>
                                          @endif
                                          <span class="count"> quantite:{{ $details['quantite'] }}</span>
                                      </div>
                                  </div>
                              @endforeach
                          @endif
                          <div class="row">
                              <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                  <a href="{{ route('panier') }}" class="btn btn-primary btn-block">Voir tout</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

        <div class="card-header">
          <h4 class="card-title">Liste Des Produit</h4>
        </div>
        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                Nom Produit
                </th>
                <th>
                  Description
                </th>
                <th>
                  Code catégorie
                </th>
                <th>
                  fournisseur
                </th>
                <th class="text-right">
                  Prix Unitaire
                </th>
                <th class="text-right">
                  Action
                </th>
              </thead>
              <tbody>
                <tr>
                @foreach ($produits as $produit)
                  <td>{{ $produit->nom }}</td>
                  <td> {{ $produit->description }}</td>
                  <td>{{ $produit->code_categorie }}</td>
                  <td>{{ $produit->fournisseur->nom }}</td>
                  <td> {{ $produit->prix_unitaire }}</td>
                  <td><a href="{{ route('ajouter-au-panier', $produit->id) }}" class="btn btn-primary btn-block text-center" role="button">Ajouter au panier</a> </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<form action="{{  route('acheter-produit.rechercherProduit') }}" method="GET">
  @csrf
  <input type="text" name="nom_produit" placeholder="Rechercher un produit">
  <button type="submit">Rechercher</button>
  @if(isset($recherche))
  <h2>Résultats de la recherche pour "{{ $recherche }}" :</h2>
  @if(count($produits) > 0)
</form>
@else
        <p>Aucun résultat trouvé pour "{{ $recherche }}".</p>
    @endif
@else
    <p>Effectuez une recherche pour afficher les résultats.</p>
@endif
@endsection