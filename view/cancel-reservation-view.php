<?php require_once('partial/header.php'); ?>

<section>

    <h2>Annuler une réservation</h2>

    <?php require_once('partial/_resume-reservation.php'); ?>

    <!-- Création d'un formulaire pour annuler la réservation-->
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

</section>

<?php require_once('partial/footer.php'); ?>