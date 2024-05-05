<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau compte utilisateur</title>
</head>
<body>
    <p>Bonjour, {{$prenom }} {{$nom}}</p>

    <p>Votre nouveau compte utilisateur a été créé avec succès !</p>

    <p>Voici vos informations de connexion :</p>

    <ul>
        <li><strong>Nom d'utilisateur:</strong> {{ $username }}</li>
        <li><strong>Mot de passe par défaut:</strong> {{ $password }}</li>
    </ul>

    <p>Vous pouvez maintenant vous connecter à notre plateforme 
        Gestion Stock du carburant de l’UFR SET.
    </p>
    <h4>Veuillez changer votre mot de passe une fois connecté</h4>
    <p>Merci et à bientôt !</p>
</body>
</html>
