<?php
require_once('../config.php');
require_once('../model/reservation-repository.php');
require_once('../model/reservation-model.php');

// Je récupère la réservation créée par l'utilisateur si elle existe et la stocke dans une variable
$reservationForUser = findReservationForUser();

// Récupère la requête en méthode POST de la session si il y en a une
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        // permet de vérifier l'existence de l'objet "reservationForUser" et si cet objet est une instance d'une 
        // classe précise (ici instanceof vérifie si "reservationForUser" est un objet et si "reservationForUser" est une instance
        // de la classe "Reservation")
        if ($reservationForUser && $reservationForUser instanceof Reservation) {

            // Appel de la méthode pour annuler la réservation de l'utilisateur depuis le model
            $reservationForUser->cancel();
            persistReservation($reservationForUser);

        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

require_once('../view/cancel-reservation-view.php');
