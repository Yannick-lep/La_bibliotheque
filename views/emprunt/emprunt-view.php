<?php require PHP_ROOT.'/views/partials/header.php'; ?>

<h1 class="title"><?= $title_text ?></h1>

<form method="post">
    <?php if (array_key_exists("id_emprunt", $emprunt)) { ?>
        <input type="hidden" name="id_emprunt" value="<?= $emprunt['id_emprunt'] ?>">
    <?php } ?>
    <div>
        <label for="id_livre">Id Livre</label>
        <input type="number" name="id_livre" id="id_livre" value="<?= $emprunt['id_livre'] ?>">
    </div>
    <div>
        <label for="id_utilisateur">Id Utilisateur</label>
        <input type="number" name="id_utilisateur" id="id_utilisateur" value="<?= $emprunt['id_utilisateur'] ?>">
    </div>
    <div>
        <label for="date_sortie">Date de sortie</label>
        <input type="date" name="date_sortie" id="date_sortie" value="<?= $emprunt['date_sortie'] ?>">
    </div>
    <div>
        <label for="date_rendu">Date de retour</label>
        <input type="date" name="date_rendu" id="date_rendu" value="<?= $emprunt['date_rendu'] ?>">
    </div>
    <div>
        <label for="statut">Statut</label>
        <input type="text" name="statut" id="statut" value="<?= $emprunt['statut'] ?>">
    </div>
    <input type="submit" name="submit" value="<?= $submit_text ?>">

</form>
<?php require PHP_ROOT.'/views/partials/footer.php'; ?>
