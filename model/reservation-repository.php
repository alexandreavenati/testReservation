<?php
// Permet de sauvegarder la réservation
function persistReservation($reservation)
{
    // connection à la BDD
    $pdo = connectToDB();

    // stockage des dates pour les insérer dans VALUES
    $startDateFormatted = $reservation->startDate->format('Y-m-d');
    $endDateFormatted = $reservation->endDate->format('Y-m-d');
    $bookedAtDateFormatted = $reservation->bookedAt->format('Y-m-d');

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

// Cherche si une réservation existe
function findReservationForUser() {

	// Je me connecte à la BDD
	$pdo = connectToDB();


	// je fait une demande SQL à ma BDD qui récupère la dernière réservation au nom de David Robert
	// trié par id descendant
	$query = "SELECT * FROM `reservation` 
				WHERE nom = 'David Robert'
				ORDER BY id DESC
				LIMIT 1";

	// j'execute la requête et je récupère les données sous forme de tableau
	$result = $pdo->query($query, PDO::FETCH_ASSOC);

	$reservation = $result->fetch();
    
	return $reservation;
}




/**
* Permettrait de récupérer toutes les réservations 
* function findAllReservations() {
*
*	// Trouver toutes les réservation dont le nom est David Robert
*	// Récupérer la dernère par date de création
*	$pdo = connectToDB();
*
*	$query = "SELECT * FROM `reservation` ORDER BY id DESC";
*
*	$result = $pdo->query($query, PDO::FETCH_ASSOC);
*
*	$reservations = $result->fetchAll();
*
*	return $reservations;
*}
**/
