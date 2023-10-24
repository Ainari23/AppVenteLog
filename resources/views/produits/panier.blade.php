@extends('layouts.app', [
    'namePage' => 'Panier',
    'class' => 'sidebar-mini',
    'activePage' => 'panier',
])
   
@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Produit</th>
            <th style="width:10%">Prix unitaire</th>
            <th style="width:8%">Quantite</th>
            <th style="width:22%" class="text-center">Prix Total</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('panier'))
            @foreach(session('panier') as $id => $details)
            @php
            if (isset($details['prix_unitaire']) && isset($details['quantite'])) {
                $total += $details['prix_unitaire'] * $details['quantite'];
            }
            @endphp
            
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        @isset($details['nom'])
                            €{{ $details['nom'] }}
                        @else
                            N/A
                        @endisset
                    </td>
                    <td data-th="Price">
                        @isset($details['prix_unitaire'])
                            €{{ $details['prix_unitaire'] }}
                        @else
                            N/A
                        @endisset
                    </td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantite'] }}" class="form-control quantity modifier_panier" min="1" />
                    </td>
                    <td data-th="Subtotal" class="text-center">
                        @if(isset($details['quantite']))
                            ${{ $details['prix_unitaire'] * $details['quantite'] }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm retirer_panier"><i class="fa fa-trash-o"></i> Supprimer</button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total €{{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/produits/acheter-produit') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continuer achat</a><form method="post" action="{{ route('envoyer-au-vendeur') }}">
                    @csrf
                    <!-- Ajoutez des champs cachés pour les éléments du panier -->
                    @if(session('panier'))
                        @foreach(session('panier') as $id => $details)
                            <input type="hidden" name="elementsDuPanier[{{ $id }}][id]" value="{{ isset($details['id']) ? $details['id'] : '' }}">
                            <input type="hidden" name="elementsDuPanier[{{ $id }}][user_id	]" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="elementsDuPanier[{{ $id }}][quantite]" value="{{ $details['quantite'] }}">
                            <input type="hidden" name="elementsDuPanier[{{ $id }}][prix_unitaire]" value="{{ $details['prix_unitaire'] }}">
                            <input type="hidden" name="elementsDuPanier[{{ $id }}][prix_total]" value="{{ $total }}">
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-success"><i class="fa fa-money"> Envoyer au vendeur</button>
                </form>
            </td>
        </tr>
    </tfoot>
</table>
@endsection


@section('scripts')
<script type="text/javascript">
   
    $(".modifier_panier").change(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        $.ajax({
            url: '{{ route('modifier-panier') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantite").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
   
    $(".retirer_panier").click(function (e) {
        e.preventDefault();
   
        var ele = $(this);
   
        if(confirm("Voulez vous vraiment supprimers?")) {
            $.ajax({
                url: '{{ route('supprimer-du-panier') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection