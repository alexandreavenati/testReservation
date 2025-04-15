<?php
function findReservationForUser(){

    if (session_status() === PHP_SESSION_NONE) {

        session_start();

    }

    return $_SESSION["reservation"];
}

function persistReservation($reservation){

    if (session_status() === PHP_SESSION_NONE) {

        session_start();

    }

    $_SESSION["reservation"] = $reservation;
}
