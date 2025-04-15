<?php
function findReservationForUser()
{

    if (session_status() === PHP_SESSION_NONE) {

        session_start();
    }

    if (array_key_exists("reservation", $_SESSION)) {
        
        return $_SESSION["reservation"];
    }
}

function persistReservation($reservation)
{

    if (session_status() === PHP_SESSION_NONE) {

        session_start();
    }

    $_SESSION["reservation"] = $reservation;
}
