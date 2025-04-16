<?php
require_once('../config.php');
require_once('../model/reservation-repository.php');
require_once('../model/reservation-model.php');

// Je récupère la réservation créée par l'utilisateur si elle existe et la stocke dans une variable
$reservationForUser = findReservationForUser();

require_once('../view/cancel-reservation-view.php');