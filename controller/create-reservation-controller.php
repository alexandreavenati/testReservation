<?php
require_once('../config.php');
require_once('../model/reservation-model.php');

// préparation pour envoyer un message (vide ici)
$reservation = null;
$errorMessage = "";

// Vérifie l'nevoi du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Récupération des données envoyées par le formulaire
        $name = $_POST['name'];

        // Obligé de vérifier car c'est un select donc l'utilisateur est obligé de faire un choix
        $place = isset($_POST['place']);
        var_dump($place);

        // Les données envoyées pour les dates dans le formulaire sont en chaînes de caractères donc on doit créer des DateTime pour
        // que ça fonctionne
        $startDate = new DateTime($_POST['startDate']);
        $endDate = new DateTime($_POST['endDate']);

        // Je vérifie si "cleaningOption" est existant et validé puis je change sa valeur en booléen
        $cleaningOption = isset($_POST['cleaningOption']) && $_POST['cleaningOption'] === "on" ? true : false;

        // création de la réservation
        $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);
    } catch (Exception $e) {

        // Sinon le message de l'Exception du modèle est transmis
        $errorMessage = $e->getMessage();
    }
}

require_once('../view/create-reservation-view.php');
