<link rel="stylesheet" href="/assets/css/now-ui-dashboard.css">
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>

<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js" type="text/javascript"></script>
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">" />
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