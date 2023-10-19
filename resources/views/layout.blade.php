<!DOCTYPE html>
<html>
<head>
    <title>Ajouter au panier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
   
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
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
   
<br/>
<div class="container">
   
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
   
    @yield('content')
</div>
   
@yield('scripts')
</body>
</html>