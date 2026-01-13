<header>
    <div class="menu-frame">
        <div class="menu">
            <div class="logo">
                <a href="<?= WEB_ROOT . "?page=search-livres" ?>"
                    style="text-decoration: none; color: #b0dcb0;">
                    <h1 style="margin-bottom: 0; color: #b0dcb0; font-size: 2rem; letter-spacing: 0.2rem;">La Bibliothèque</h1>
                </a>
            </div>

            <?php if (is_admin()) { ?>
                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=list-livres" ?>">
                        Livres
                    </a>
                </div>

                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=list-utilisateur" ?>">
                        Utilisateurs
                    </a>
                </div>

                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=list-emprunts" ?>">
                        Reservations
                    </a>
                </div>

                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=login" ?>">
                        Déconnexion
                    </a>
                </div>
            <?php } elseif (is_logged_in()) { ?>
                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=edit-profil.php&id=" . $_SESSION['id_users'] ?>">
                        Profil
                    </a>
                </div>

                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=list-meslivres" ?>">
                        Mes réservations
                    </a>
                </div>
            <?php } else { ?>
                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=register" ?>">
                        Inscription
                    </a>
                </div>

                <div class="menu-item">
                    <a href="<?= WEB_ROOT . "?page=login" ?>">
                        Connexion
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="status">
            <div class="avatar">
                <a href="<?= WEB_ROOT . '?page=login' ?>">
                    <img src="<?= is_logged_in() ?
                                    WEB_ROOT . '/assets/img/person_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg' :
                                    WEB_ROOT . '/assets/img/no_accounts_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg' ?>" alt="">
                </a>
            </div>
            <?php if (is_logged_in()) { ?>
                <div><?= $_SESSION['name'] ?></div>
            <?php } ?>
            <?php if (is_admin()) { ?>
                <div class="admin">Administration</div>
            <?php } ?>
        </div>
    </div>
</header>