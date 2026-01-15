<?php require PHP_ROOT . '/views/partials/header.php'; ?>

<h1 class="title">Valider un emprunt</h1>

<?php if (empty($emprunts)) { ?>
    <p class="subtitle">Aucun emprunt est en attente.</p>
<?php } else { ?>

    <table>
        <thead>
            <tr>
                <th>Abonné </th>
                <th>Titre du livre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emprunts as $emprunt) { ?>
                <tr>
                    <td><?= $emprunt['nom'] . ' ' . $emprunt['prenom'] ?></td>
                    <td><?= $emprunt['titre'] ?></td>
                    <td>
                        <a href="?page=validate-depart-emprunts&id=<?= $emprunt['id_emprunt'] ?>">Valider ce départ</a>
                        <?php
                        $dateReservation = new DateTime($emprunt['date_reservation']);
                        $dateRetourPrevue = clone $dateReservation;
                        $dateRetourPrevue->modify('+1 month'); // ou la durée réelle de prêt
                        $en_retard = new DateTime() > $dateRetourPrevue;
                        if ($en_retard) { ?>
                            <a href="?page=annulation-emprunts&id=<?= $emprunt['id_emprunt'] ?>" style="background-color: lightcoral" ;>Annuler</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<?php require PHP_ROOT . '/views/partials/footer.php'; ?>