<?php require PHP_ROOT . '/views/partials/header.php'; ?>

<h1 class="title">Editer un livre</h1>

<form action="?id=<?= $livre['id_livre']; ?>" method="POST">
    <div>
        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" value="<?= $livre['auteur']; ?>" required>
    </div>
    <div>
        <label for="titre">Titre</label>
        <input type="text" name="titre" value="<?= $livre['titre']; ?>" required>
    </div>
    <div>
        <label for="resume">Résumé</label>
        <input type="text" name="resume" value="<?= $livre['resume']; ?>" required>
    </div>
    <div>
        <label for="genre">Genre</label>
        <input type="text" name="genre" value="<?= $livre['genre']; ?>" required>
    </div>
    <div>
        <input type="submit" name="envoyer" value="Editer livre">
    </div>
</form>

<?php require PHP_ROOT . '/views/partials/footer.php'; ?>