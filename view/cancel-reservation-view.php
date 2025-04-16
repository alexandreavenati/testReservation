<?php require_once('partial/header.php'); ?>

<section>

    <h2>Annuler une réservation</h2>

    <!-- Création d'un formulaire pour envoyer ses données -->
    <form method="POST">

        <div>
            <button type="submit">Annuler la réservation</button>
        </div>

    </form>

    <!-- Résumé de la réservation si il y en a une -->
    <?php if (!is_null($reservationForUser)) { ?>
        <div>
            <p><strong>Nom : <?php echo $reservationForUser->name; ?></strong></p>
            <p><strong>Lieu : <?php echo str_replace('_', ' ', $reservationForUser->place); ?></strong></p>
            <p><strong>Date de début : <?php echo $reservationForUser->startDate->format('d-m-y'); ?></strong></p>
            <p><strong>Date de fin : <?php echo $reservationForUser->endDate->format('d-m-y'); ?></strong></p>
            <p><strong>Option de ménage : <?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?></strong></p>
            <p><strong>Prix total : <?php echo $reservationForUser->totalPrice ?></strong></p>
        </div>
    <?php } ?>

</section>

<?php require_once('partial/footer.php'); ?>