<?php
// Permet de sauvegarder la réservation
function persistReservation($reservation)
{

    if (session_status() === PHP_SESSION_NONE) {

        session_start();

        // connection à la BDD
        $pdo = connectToDB();

        // stockage des dates pour les insérer dans VALUES
        $startDateFormatted = $reservation->startDate->format('d-m-y');
        $endDateFormatted = $reservation->endDate->format('d-m-y');
        $bookedAtDateFormatted = $reservation->bookedAt->format('d-m-y');

        // Insérer les données dans la BDD, dans le tableau reservation
        $query = "INSERT INTO reservation (nom, place, start_date, end_date, night_price, cleaning_option, total_price, status, booked_at)
                VALUES
                (
                '$reservation->name', 
                '$reservation->place',
                '$startDateFormatted', 
                '$endDateFormatted', 
                $reservation->nightPrice, 
                $reservation->cleaningOption, 
                $reservation->totalPrice, 
                '$reservation->status', 
                '$bookedAtDateFormatted'
                )";

        $pdo->query($query);

    }

    // Sauvegarde la dernière réservation de la session dans une variable
    $_SESSION["reservation"] = $reservation;
}

// Cherche si une réservation existe
function findReservationForUser()
{

    // Vérifie le statut de la session (lancé ou pas lancé)
    if (session_status() === PHP_SESSION_NONE) {

        // Si pas lancé, lance une session
        session_start();
        
    }

    // Vérifie si il y a une réservation dans la session
    if (array_key_exists("reservation", $_SESSION)) {

        // Si oui il la retourne
        return $_SESSION["reservation"];
    } else {
        return null;
    }
}

