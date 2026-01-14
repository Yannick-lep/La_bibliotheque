<?php require PHP_ROOT . '/views/partials/header.php'; ?>

<h1 class="title">Liste de emprunts</h1>

<div class="button">
    <a href="?page=add-emprunts">Ajouter un emprunt</a>
</div>

<?php if (empty($emprunts)) { ?>
<?php } ?>

<table>
    <thead>
        <tr>
            <th>Id Emprunt</th>
            <th>Id Livre</th>
            <th>Id Utilisateurs</th>
            <th>Date de sortie</th>
            <th>Date de rendu</th>
            <th>Etat</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($emprunts as $emprunt) { ?>
            <tr>
                <td><?= $emprunt['id_emprunt'] ?></td>
                <td><?= $emprunt['id_livre'] ?></td>
                <td><?= $emprunt['id_utilisateur'] ?></td>
                <td><?= $emprunt['date_sortie'] ?></td>
                <td><?= $emprunt['date_rendu'] ?></td>
                <td><?= $emprunt['statut'] ?></td>
                <th>
                    <a href="?page=edit-emprunts&id=<?= $emprunt['id_emprunt'] ?>">Edit</a>
                    <a href="?page=del-emprunts&id=<?= $emprunt['id_emprunt'] ?>"  onclick="return confirm('Etes vous certain de vouloir supprimer cet emprunt ?');">Supprimer</a>
                </th>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require PHP_ROOT . '/views/partials/footer.php'; ?>