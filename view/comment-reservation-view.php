<?php require_once('partial/header.php'); ?>

<section>

    <h2>Laissez un commentaire sur une réservation</h2>

    <?php require_once('partial/_resume-reservation.php'); ?>

    <!-- Création d'un formulaire pour commenter la réservation-->
    <form method="POST">

        <div>
            <button type="submit">Laissez un commentaire sur la réservation</button>
        </div>

        <div>
            <label for="comment">Commentaire :
                <textarea name="comment" id="comment" placeholder="Entrez votre commentaire..."></textarea>
            </label>
        </div>

    </form>



    <?php if (isset($reservationForUser->comment)) { ?>
        <!-- Commentaire si il y en a un -->
        <div>
            <h3>Votre commentaire :</h3>
            <p><?php echo $reservationForUser->comment; ?></p>
        </div>
    <?php } ?>

    <?php if (isset($errorMessage)) { ?>
        <!-- Message d'erreur si il n'y a pas de commentaire valide -->
        <div>
            <h3><?php echo $errorMessage; ?></h3>
        </div>
    <?php } ?>

</section>

<?php require_once('partial/footer.php'); ?>