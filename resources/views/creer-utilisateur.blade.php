<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Créer un nouvel utilisateur</h1>

    <form action="{{ route('utilisateur.creer') }}" method="POST">
        @csrf

        <label for="nom_utilisateur">Nom d'utilisateur :</label>
        <input type="text" id="nom_utilisateur" name="nom_utilisateur" required><br><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

        <label for="roles">Rôles (séparés par des virgules) :</label>
        <input type="text" id="roles" name="roles" required><br><br>

        <button type="submit">Créer Utilisateur</button>
    </form>
</body>
</html>