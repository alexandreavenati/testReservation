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

    public $cancelledAt;

    public $paidAt;

    public $commentedAt;

    public $comment;

    // ajout de paramètres sur les valeurs qui ont tendances à changer selon les réservations 
    // (méthode pour réaliser une réservation)
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

    // création d'une méthode pour annuler la réservation
    public function cancel() {
        // si le statut de la réservation est "CART" alors on peut passer le statut en "CANCELLED"
        if ($this->status === "CART") {
            $this->status = "CANCELLED";
            $this->cancelledAt = new DateTime();
        }
    }

    // création d'une méthode pour payer la réservation
    public function pay() {
        // si le statut de la réservation est "CART" alors on peut passer le statut en "PAID"
        if ($this->status === "CART") {
            $this->status = "PAID";
            $this->paidAt = new DateTime();
        }
    }

    // création d'une méthode pour laisser un commentaire
    public function leaveComment($comment) {
        // si le statut de la réservation est "PAID" alors on peut passer le statut en "COMMENTED" en ajoutant un commentaire 
        // en paramètre
        if ($this->status === "PAID") {
            $this->status = "COMMENTED";
            $this->commentedAt = new DateTime();
            $this->comment = $comment;
        }
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

// Appel de la fonction "pay" sur l'objet "reservation" pour payer la réservation
$reservation->pay();

// Appel de la fonction "leaveComment" sur l'objet "reservation" pour commenter après avoir payé la réservation
$reservation->leaveComment("Bonne chambre, propre et confortable.");

var_dump($reservation);
die;