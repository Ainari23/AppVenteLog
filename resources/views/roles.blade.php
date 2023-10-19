
<form action="/attribuer-role-admin" method="POST">
    @csrf
    <input type="hidden" name="utilisateur_id" value="1"> <!-- Remplacez 1 par l'ID de l'utilisateur -->
    <button type="submit">Attribuer le rôle d'Administrateur</button>
</form>

<form action="/attribuer-role-fournisseur" method="POST">
    @csrf
    <input type="hidden" name="utilisateur_id" value="1"> <!-- Remplacez 1 par l'ID de l'utilisateur -->
    <button type="submit">Attribuer le rôle de Fournisseur</button>
</form>
<form action="/attribuer-role-gestionnaire-stock" method="POST">
    @csrf
    <input type="hidden" name="utilisateur_id" value="1"> <!-- Remplacez 1 par l'ID de l'utilisateur -->
    <button type="submit">Attribuer le rôle de Gestionnaire de Stock</button>
</form>
<form action="/attribuer-role-vendeur" method="POST">
    @csrf
    <input type="hidden" name="utilisateur_id" value="1">
    <button type="submit">Attribuer le rôle de Vendeur</button>
</form>

<form action="/attribuer-role-employe" method="POST">
    @csrf
    <input type="hidden" name="utilisateur_id" value="1">
    <button type="submit">Attribuer le rôle d'Employé</button>
</form>
