<?php require PHP_ROOT . '/views/partials/header.php'; ?>
<h1 class="title">Identifiez-vous</h1>

<form method="post">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">
    </div>
    <input type="submit" name="submit" value="Valider">
</form>

<?php require PHP_ROOT . '/views/partials/footer.php'; ?>