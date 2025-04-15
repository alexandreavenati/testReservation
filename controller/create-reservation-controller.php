<?php
require_once('../config.php');
require_once('../model/reservation-model.php');
require_once('../model/reservation-repository.php');

// préparation pour envoyer un message (vide ici)
$errorMessage = "";
$reservationForUser = findReservationForUser();

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

    try {

        // création de la réservation
        $reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);
        persistReservation($reservation);

    } catch (Exception $e) {

        // Sinon il y a une erreur et le message de l'Exception du model est transmis
        $errorMessage = $e->getMessage();
    }
}

require_once('../view/create-reservation-view.php');
