<!-- Résumé de la réservation si il y en a une -->
<?php if (!is_null($reservationForUser)) { ?>
        <div>
            <p><strong>Nom : <?php echo $reservationForUser->name; ?></strong></p>
            <p><strong>Lieu : <?php echo str_replace('_', ' ', $reservationForUser->place); ?></strong></p>
            <p><strong>Date de début : <?php echo $reservationForUser->startDate->format('d-m-y'); ?></strong></p>
            <p><strong>Date de fin : <?php echo $reservationForUser->endDate->format('d-m-y'); ?></strong></p>
            <p><strong>Option de ménage : <?php echo $reservationForUser->cleaningOption ? "oui" : "non"; ?></strong></p>
            <p><strong>Prix total : <?php echo $reservationForUser->totalPrice ?></strong></p>
            <p><strong>Statut : "<?php echo $reservationForUser->status ?>"</strong></p>
            <?php if (isset($message)) { ?>
                <h3><?php echo $message; ?></h3>
            <?php } ?>
        </div>
    <?php } ?>