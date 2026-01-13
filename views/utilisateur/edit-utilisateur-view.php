<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
</head>
<body>
    <main class="container">
        <h1>editer un utilisateur</h1>
        <form action="" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" name="nom" value="<?= htmlspecialchars($nom); ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" name="prenom" value="<?= htmlspecialchars($prenom); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="mot de passe">
            </div>
            <div>
                <button type="submit" name="envoyer">Editer Utilisateur</button>
            </div>
        </form>
    </main>
</body>
</html>