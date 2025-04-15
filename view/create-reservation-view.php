<?php require_once('partial/header.php') ?>

<section>

    <h2>Créer une réservation</h2>

    <!-- Création d'un formulaire pour envoyer ses données -->
    <form method="POST">
        <div>
            <label for="name">Nom
                <input type="text" placeholder="Entrez votre nom..." id="name" name="name">
            </label>
        </div>

        <div>
            <label for="place">Place
                <select name="place" id="place">
                    <option disabled selected value="">--Veuillez choisir un endroit--</option>
                    <option value="Chateau_de_Versailles">Château de Versailles</option>
                    <option value="ZAD_de_Limoges">ZAD de Limoges</option>
                    <option value="Renault_Clio">Renault Clio</option>
                    <option value="Maison_de_campagne">Maison de campagne</option>
                </select>
            </label>
        </div>

        <div>
            <label for="startDate">Date de début
                <input type="date" name="startDate" id="startDate">
            </label>
        </div>

        <div>
            <label for="endDate">Date de fin
                <input type="date" name="endDate" id="endDate">
            </label>
        </div>

        <div>
            <label for="cleaningOption">Option ménage
                <input type="checkbox" name="cleaningOption" id="cleaningOption">
            </label>
        </div>

        <div>
            <button type="submit">Valider la réservation</button>
        </div>

    </form>

        <div>
            <h3><?php echo $errorMessage; ?></h3>
        </div>

    <?php if (!is_null($reservation)) { ?>
        <div>
            <p>Nom : <?php echo $reservation->name; ?></p>
            <p>Lieu : <?php echo str_replace('_', ' ', $reservation->place); ?></p>
            <p>Date de début : <?php echo $reservation->startDate->format('d-m-y'); ?></p>
            <p>Date de fin : <?php echo $reservation->endDate->format('d-m-y'); ?></p>
            <p>Option de ménage : <?php echo $reservation->cleaningOption ? "oui" : "non"; ?></p>
            <p>Prix total : <?php echo $reservation->totalPrice ?></p>
        </div>
    <?php } ?>

</section>

<?php require_once('partial/footer.php');
