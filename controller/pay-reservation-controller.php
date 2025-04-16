<?php 
require_once('../config.php');
require_once('../model/reservation-model.php');
require_once('../model/reservation-repository.php');

$reservationForUser = findReservationForUser();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        // permet de vérifier si la variable "reservationForUser" n'est pas nulle et vérifie l'existence de l'objet
        // "reservationForUser" et si cet objet est une instance d'une  classe précise
        // (ici instanceof vérifie si "reservationForUser" est un objet et si "reservationForUser" est une instance 
        // de la classe "Reservation")
        if ($reservationForUser && $reservationForUser instanceof Reservation) {

            // Appel de la méthode pour annuler la réservation de l'utilisateur depuis le model
            $reservationForUser->pay();
            persistReservation($reservationForUser);

            $message = "La réservation a été payée.";
        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

require_once('../view/pay-reservation-view.php');