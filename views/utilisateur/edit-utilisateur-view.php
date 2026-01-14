<?php
include PHP_ROOT . '/views/partials/header.php';
?>
<h1>editer un utilisateur</h1>

<?php if (!empty($errors)) : ?>
    <div>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="POST">
    <div>
        <label for="nom" class="form-label">Nom :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($nom); ?>" required>
    </div>
    <div>
        <label for="prenom" class="form-label">Prénom :</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($prenom); ?>" required>
    </div>
    <div>
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
    </div>
    <div>
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="mot de passe">
    </div>
    <div>
        <label for="password_confirm" class="form-label">Confirmation mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="confirmer mot de passe">
    </div>
    <div>
        <label for="role">Rôle</label>
        <select name="role" id="role">
            <option value="abonne" selected>Abonne</option>
            <option value="employe">Employe</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Editer Utilisateur" name="envoyer">
    </div>
</form>
<?php include PHP_ROOT . '/views/partials/footer.php';
