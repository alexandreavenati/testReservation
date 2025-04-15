<?php
require_once('../config.php');
require_once('../model/reservation-model.php');

// préparation pour envoyer un message (vide ici)
$message = "";

// Vérifie l'nevoi du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données envoyées par le formulaire
    $name = $_POST['name'];
    $place = $_POST['place'];

    // Les données envoyées pour les dates dans le formulaire sont en chaînes de caractères donc on doit créer des DateTime pour
    // que ça fonctionne
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['endDate']);

    // Je vérifie si "cleaningOption" est validé
    if ($cleaningOption = isset($_POST['cleaningOption']) && $_POST['cleaningOption'] === "on") {

        // Si oui je transforme en booléen true
        $cleaningOption = true;
    } else {

        // Si non je transforme en booléen false
        $cleaningOption = false;
    }


    $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);

    if ($startDate < $endDate) {
        // Message qui sera envoyé
        $message = "Votre réservation est confirmée, au prix de " . $reservation->totalPrice . ".";
    }else {
        $message = "Votre demande de réservation n'est pas valide !";
    }
}

require_once('../view/create-reservation-view.php');
