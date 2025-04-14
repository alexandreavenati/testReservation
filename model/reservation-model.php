<?php
// création d'une classe
class Reservation
{
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

    // ajout de paramètres sur les valeurs qui ont tendances à changer selon les réservations
    public function __construct($name, $place, $startDate, $endDate, $cleaningOption)
    {
        // valeurs envoyées par l'utilisateur
        $this->name = $name;
        $this->place = $place;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->cleaningOption = $cleaningOption;

        $this->nightPrice = 1000;

        // vérification de l'option de nettoyage (choisi ou pas)
        if ($cleaningOption === true) {
            // valeurs calculées automatiquement 
            $totalPrice = (($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) / (3600 * 24) * $this->nightPrice) + 5000;
        } else {
            $totalPrice = (($this->endDate->getTimestamp() - $this->startDate->getTimestamp()) / (3600 * 24) * $this->nightPrice);
        }

        $this->totalPrice = $totalPrice;
        $this->bookedAt = new DateTime();
        $this->status = "CART";
    }
}

// exemple de valeurs envoyées par un utilisateur
$name = "Guillaume L'Heureux";
$place = "Château de Versailles";
$startDate = new DateTime("25-05-15");
$endDate = new DateTime("25-06-02");
$cleaningOption = false;

// création de la réservation (paramètres nécessaires car la fonction "__construct" a des paramètres pour fonctionner)
$reservation = new Reservation($name, $place, $startDate, $endDate, $cleaningOption);

var_dump($reservation);die;