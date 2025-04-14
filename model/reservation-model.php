<?php
// création d'une classe
class Reservation {
    // création des variables de la classe qui correspondent aux éléments de la réservation
    public $name;

    public $place;

    public $startDate;

    public $endDate;

    public $totalPrice;

    public $nightPrice;

    public $status;

    public $bookedAt;

    public $cleaningOption;

    public function __construct() {
        // valeurs envoyées par l'utilisateur
        $this->name = "Guillaume L'Heureux";
        $this->place = "Château de Versailles";
        $this->startDate = new DateTime("25-04-15");
        $this->endDate = new DateTime("25-05-28");
        $this->cleaningOption = true;

        $this->nightPrice = 1000;

        // valeurs calculées automatiquement 
        $totalPrice = (($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) / (3600 * 24) * $this->nightPrice) + 5000;

        $this->totalPrice = $totalPrice;
        $this->bookedAt = new DateTime();
        $this->status = "CART";
    }
}

// création de la réservation
$reservation = new Reservation();

var_dump($reservation); die;