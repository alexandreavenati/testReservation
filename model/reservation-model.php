<?php
// création d'une classe
class Reservation {
    public $name;

    public $place;

    public $startDate;

    public $endDate;

    public $totalPrice;

    public $nightPrice;

    public $status;

    public $bookedAt;

    public $cleaningOption;
}

// création de la réservation
$reservation = new Reservation();

// valeurs envoyées par l'utilisateur
$reservation->name = "Guillaume L'Heureux";
$reservation->place = "Château de Versailles";
$reservation->startDate = new DateTime("25-04-15");
$reservation->endDate = new DateTime("25-05-28");
$reservation->cleaningOption = true;

$reservation->nightPrice = 1000;

// valeurs calculées automatiquement 
$totalPrice = (($reservation->endDate->getTimestamp() - $reservation->startDate->getTimestamp()) / (3600 * 24) * $reservation->nightPrice) + 5000;

$reservation->totalPrice = $totalPrice;
$reservation->bookedAt = new DateTime();
$reservation->status = "CART";

var_dump($reservation); die;