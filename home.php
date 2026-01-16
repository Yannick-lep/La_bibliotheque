<?php require 'views/partials/header.php'; ?>

<main>
    <h1 class="title">Bienvenue sur La Bibliothèque</h1>
    <!-- horaire d'ouverture -->
    <section class="horaires-cartes">
        <h2 class="title">Horaire d'ouverture</h2>
        <div class="cards-container">

            <div class="card">
                <h3>Lundi</h3>
                <p>09:00 - 19:00</p>
            </div>

            <div class="card">
                <h3>Mardi</h3>
                <p>09:00 - 19:00</p>
            </div>
            <div class="card">
                <h3>Mercredi</h3>
                <p>09:00 - 14:00</p>
            </div>
            <div class="card">
                <h3>Jeudi</h3>
                <p>09:00 - 18:00</p>
            </div>
            <div class="card">
                <h3>Vendredi</h3>
                <p>09:00 - 19:00</p>
            </div>
            <div class="card">
                <h3>Samedi</h3>
                <p>09:00 - 17:00</p>
            </div>
            <div class="card">
                <h3>Dimanche</h3>
                <p>Fermé</p>
            </div>
        </div>
    </section>
    <section class="conditions-emprunt">
        <h2 class="title">conditions d'emprunt</h2>
        <ul>
            <li>Chaque utilisateur peut emprunter <strong>jusqu'à 5 livres</strong> simultanément</li>
            <li>La durée maximal de prêt est de <strong>1 mois</strong> à partir de la date de l'emprunt</li>
            <li>Les retards peuvent entrainer des pénalités</li>
            <li>Les réservations en ligne doivent être récupérées pendant les horaires de retrait sous un délai de 1 mois sous peine d'annulation de la réservation.</li>
        </ul>
    </section>
    <section class="conditions-emprunt">
        <h2 class="title">horaires de Retrait et Dépôt des livres</h2>
         <div class="cards-container">
              <div class="card">
                <h3>lundi</h3>
                <p>Retrait : 10:00 - 12:00</p>
                <p>Dépôt : 14:00 - 17:00</p>
            </div>
            <div class="card">
                <h3>Mardi</h3>
                <p>Retrait : 10:00 - 12:00</p>
                <p>Dépôt : 14:00 - 17:00</p>
            </div>
            <div class="card">
                <h3>Jeudi</h3>
                <p>Retrait : 14 - 17:00</p>
                <p>Dépôt : 15:00 - 19:00</p>
            </div>
         </div>
    </section>
</main>

<?php require 'views/partials/footer.php'; ?>