<?php
include 'views/partials/header.php';
?>
    
        <?php
        
        if (count($utilisateurArray) === 0) :
            echo '<h3>Aucun utilisateur ! </h3>';
            echo '<a href="' .WEB_ROOT . '/utilisateur/add-utilisateur.php" role="button"> Ajouter un utilisateur</a>';
            die();
        endif;
        ?>

        <h1>Liste des utilisateurs</h1>
        <div class="button">
            <a href="?page=add-utilisateur"
            role="button"> Ajouter un utilisateur</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurArray as $utilisateur) : ?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur['nom']); ?></td>
                        <td><?= htmlspecialchars($utilisateur['prenom']); ?></td>
                        <td><?= htmlspecialchars($utilisateur['email']); ?></td>
                        <td>
                            <a href="<?= WEB_ROOT . '?page=edit-utilisateur&id=' .$utilisateur['id_utilisateur'] ?>"
                            role="button">Edit</a>

                            <a href="<?= WEB_ROOT . '?page=del-utilisateur&id=' .$utilisateur['id_utilisateur'] ?>"
                            role="button"
                            onclick="return confirm('Etes-vous sur de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>

<?php 
include 'views/partials/footer.php'; 