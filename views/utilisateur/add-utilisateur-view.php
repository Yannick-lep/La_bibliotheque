<?php
include PHP_ROOT . '/views/partials/header.php'; ?>
<h1>Ajouter un utilisateur</h1>
<form action="" method="POST">
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>
    </div>
    <div>
        <label for="prenom">Prenom</label>
        <input type="text" name="prenom" id="prenom" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="password_confirm">Confirmer mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" required>
    </div>
    <div>
        <label for="role">Rôle</label>
        <select name="role" id="role">
            <option value="abonne" selected>Abonne</option>
            <option value="employe">Employe</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Ajouter utilisateur" name="envoyer">
    </div>
</form>
<?php include PHP_ROOT . '/views/partials/footer.php'; ?>