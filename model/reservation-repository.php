<?php

// Cherche si une réservation existe
function findReservationForUser() {

    // Vérifie le statut de la session (lancé ou pas lancé)
    if (session_status() === PHP_SESSION_NONE) {

        // Si pas lancé, lance une session
        session_start();
    }

    // Vérifie si il y a une réservation dans la session
    if (array_key_exists("reservation", $_SESSION)) {

        // Si oui il la retourne
        return $_SESSION["reservation"];
    }
}

// Permet de sauvegarder la réservation
function persistReservation($reservation) {

    if (session_status() === PHP_SESSION_NONE) {

        session_start();
    }

    // Sauvegarde la dernière réservation de la session dans une variable
    $_SESSION["reservation"] = $reservation;
}
