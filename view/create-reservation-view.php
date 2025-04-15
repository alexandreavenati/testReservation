<?php require_once('partial/header.php') ?>

<section>

    <h2>Créer une réservation</h2>

    <!-- Création d'un formulaire pour envoyer ses données -->
    <form method="POST">
        <div>
            <label for="name">Nom
                <input required type="text" placeholder="Entrez votre nom..." id="name" name="name">
            </label>
        </div>

        <div>
            <label for="place">Place
                <select name="place" id="place" required>
                    <option disabled selected value="">--Veuillez choisir un endroit--</option>
                    <option value="Chateau_versailles">Château de Versailles</option>
                    <option value="ZAD_Limoges">ZAD de Limoges</option>
                    <option value="Renault_Clio">Renault Clio</option>
                    <option value="Maison_campagne">Maison de campagne</option>
                </select>
            </label>
        </div>

        <div>
            <label for="startDate">Date de début
                <input required type="date" name="startDate" id="startDate">
            </label>
        </div>

        <div>
            <label for="endDate">Date de fin
                <input required type="date" name="endDate" id="endDate">
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

    <!-- Envoi du message -->
    <h3><?php echo $message ?></h3>

</section>

<?php require_once('partial/footer.php');
