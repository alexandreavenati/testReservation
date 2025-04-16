<?php
require_once('../config.php');
require_once('../model/reservation-repository.php');
require_once('../model/reservation-model.php');

// Je récupère la réservation créée par l'utilisateur si elle existe et la stocke dans une variable
$reservationForUser = findReservationForUser();

// Récupère la requête en méthode POST de la session si il y en a une
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        if ($reservationForUser && $reservationForUser instanceof Reservation) {

            // Récupère le commentaire et le stocke
            $comment = $_POST['comment'];

            // Appel de la méthode pour commenter la réservation de l'utilisateur  en utilisant le commentaire récupéré
            $reservationForUser->leaveComment($comment);
            persistReservation($reservationForUser);

        }
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
    }
}

require_once('../view/comment-reservation-view.php');
