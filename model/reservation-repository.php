<?php
function findReservationForUser() {

	session_start();

	return $_SESSION["reservation"];

}

function persistReservation($reservation) {

	$_SESSION["reservation"] = $reservation;
    
}