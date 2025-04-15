<?php
function findReservationForUser() {

	session_start();

	return $_SESSION["reservation"];

}

function persistReservation($reservation) {

	session_start();

	$_SESSION["reservation"] = $reservation;

}