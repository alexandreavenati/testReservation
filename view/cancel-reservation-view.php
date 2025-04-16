<?php require_once('partial/header.php'); ?>

<section>

    <h2>Annuler une réservation</h2>

    <!-- Création d'un formulaire pour envoyer ses données -->
    <form method="POST">

        <div>
            <button type="submit">Annuler la réservation</button>
        </div>

    </form>

    <?php if (isset($errorMessage)) { ?>
    <!-- Message d'erreur si il y en a -->
    <div>
        <h3><?php echo $errorMessage; ?></h3>
    </div>
    <?php } ?>

    <!-- Résumé de la réservation si il y en a une et permet de vérifier si une variable est un objet et si cet objet est une instance d'une classe précise 
        (ici instanceof vérifie si "reservationForUser" est un objet et si "reservationForUser" est une instance
        de la classe "Reservation") -->
    <?php if (!is_null($reservationForUser) && $reservationForUser instanceof Reservation) { ?>
        <div>
            <p><strong>Nom : <?php echo $reservationForUser->name; ?></strong></p>
            <p><strong>Lieu : <?php echo str_replace('_', ' ', $reservationForUser->place); ?></strong></p>
            <p><strong>Date de début : <?php echo $reservationForUser->startDate->format('d-m-y'); ?></strong></p>
            <p><strong>Date de fin : <?php echo $reservationForUser->endDate->format('d-m-y'); ?></strong></p>
            <p><strong>Option de ménage : <?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?></strong></p>
            <p><strong>Prix total : <?php echo $reservationForUser->totalPrice ?></strong></p>
            <p><strong>Statut : "<?php echo $reservationForUser->status ?>"</strong></p>
        </div>
    <?php } ?>

</section>

<?php require_once('partial/footer.php'); ?>