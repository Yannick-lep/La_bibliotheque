<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
</head>
<body>
    <main class="container">
        <h1>Ajouter un utilisateur</h1>
        <form action="" method="POST">
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" required> 
            </div>
             <div>
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" required> 
            </div>
             <div>
                <label for="email">Email</label>
                <input type="text" name="email" required> 
            </div>
             <div>
                <label for="nom">Mot de passe</label>
                <input type="password" name="password" id="password" required> 
            </div>
             <div>
                <button type="submit" name="envoyer">Ajouter utilisateur</button>
            </div>
        </form>

    </main>
</body>
</html>