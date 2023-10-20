
<h1>Liste des Produits</h1>
<!-- Connection -->
<ul>
    @auth
    {{ \Illuminate\Support\Facades\Auth::user()->name }}
    <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
        @method('delete')
        @csrf
        <button class="nav-link">Se déconnecter</button>
    </form>
    @endauth
    @guest
    @endguest
    <ul>
        @foreach ($produits as $produit)
            <li>{{ $produit->nom }} 
                <br>- {{ $produit->description }} 
                <br>- {{ $produit->code_categorie }}
                <br>-Vendu par le fournisseur : {{ $produit->fournisseur->nom }}
                <br>-Prix : {{ $produit->prix_unitaire }} €
            </li>
        @endforeach
    </ul>