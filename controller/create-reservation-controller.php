<?php
require_once('../config.php');
require_once('../model/reservation-model.php');

// préparation pour envoyer un message (vide ici)
$reservation = null;
$errorMessage = "";

// Vérifie l'envoi du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération des données envoyées par le formulaire
    $name = $_POST['name'];

    // Vérification de l'existence de 'place' dans $_POST avant d'y accéder
    // "?" est un opérateur ternaire (forme abrégée d'une instruction conditionnelle "if/else"
    // qui permet de rendre le code plus compact)
    $place = isset($_POST['place']) ? $_POST['place'] : ''; 

    // Récupération des dates
    $startDate = new DateTime($_POST['startDate']);
    $endDate = new DateTime($_POST['endDate']);

    // Vérifie si "cleaningOption" est existant et validé puis on change sa valeur en booléen
    $cleaningOption = isset($_POST['cleaningOption']) && $_POST['cleaningOption'] === "on" ? true : false;

    // Si aucun message d'erreur, on essaie de créer la réservation
    if (empty($errorMessage)) {
        try {
            // création de la réservation
            $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);
        } catch (Exception $e) {
            // Sinon le message de l'Exception du model est transmis
            $errorMessage = $e->getMessage();
        }
    }
}

require_once('../view/create-reservation-view.php');
