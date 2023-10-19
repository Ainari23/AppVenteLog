<h1>Page du Vendeur</h1>
<h2>Éléments du panier :</h2>

<ul>
    @foreach($derniersElements as $element)
    <p>l'utilisateur a l'id : {{ $element->user_id }} a acheter le produit a l'id : {{ $element->produit_id }}, en quantite de : "{{ $element->quantite }}" pour un prix total de "{{ $element->prix_total }} €"</p>
@endforeach    
</ul>