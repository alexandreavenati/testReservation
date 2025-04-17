<!-- Résumé de la réservation si il y en a une à partir de la BDD-->
<?php if (isset($reservationForUser)) { ?>
    <div>
        <p><strong>Nom : <?php echo $reservationForUser["nom"]; ?></strong></p>
        <p><strong>Lieu : <?php echo $reservationForUser["place"]; ?></strong></p>
        <p><strong>Date de début : <?php echo $reservationForUser["start_date"]; ?></strong></p>
        <p><strong>Date de fin : <?php echo $reservationForUser["end_date"]; ?></strong></p>
        <p><strong>Option de ménage : <?php echo $reservationForUser["cleaning_option"] ? "oui" : "non"; ?></strong></p>
        <p><strong>Prix total : <?php echo $reservationForUser["total_price"] ?></strong></p>
        <p><strong>Statut : <?php echo $reservationForUser["status"] ?></strong></p>

        <?php if (isset($reservationForUser["comment"])) { ?>
        <!-- Commentaire si il y en a un -->
        <div>
            <p><strong>Votre commentaire :</strong></p>
            <p><?php echo nl2br($reservationForUser["comment"]); ?></p>
        </div>
    <?php } ?>

        <?php if (isset($message)) { ?>
            <h3><?php echo $message; ?></h3>
        <?php } ?>
    </div>
<?php } ?>