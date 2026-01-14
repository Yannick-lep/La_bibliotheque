<?php require PHP_ROOT.'/views/partials/header.php'; ?>

<h1 class="title">Valider un retour</h1>

<?php if (empty($emprunts)) { ?>
    <p class="subtitle">Aucun emprunt est en attente de retour.</p>
<?php } else { ?>

    <table>
        <thead>
            <tr>
                <th>Date de sortie</th>
                <th>Abonné </th>
                <th>Titre du livre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emprunts as $emprunt) { ?>
                <tr>
                    <td><?= $emprunt['date_sortie'] ?></td>
                    <td><?= $emprunt['nom'].' '.$emprunt['prenom'] ?></td>
                    <td><?= $emprunt['titre'] ?></td>
                    <th>
                        <a href="?page=validate-retour-emprunts&id=<?= $emprunt['id_emprunt'] ?>">Valider ce retour</a>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>

<?php require PHP_ROOT.'/views/partials/footer.php'; ?>
