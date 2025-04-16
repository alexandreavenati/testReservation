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

        // Création d'exceptions (erreur)
        // Vérification de la longueur du nom
        if (strlen($name) < 3 || empty($name)) {
            throw new Exception("Veuillez mettre un nom valide !");
        }

        // Vérification de l'emplacement (il doit être choisi)
        if (empty($place) || !is_string($place)) {
            throw new Exception("Veuillez choisir un emplacement pour votre réservation !");
        }

        // Vérification de la validité des dates
        if ($startDate > $endDate || $startDate < new DateTime()) {
            throw new Exception("La date de réservation n'est pas valide !");
        } else {
            $interval = $startDate->diff($endDate);

            // Vérification du nombre minimum de jours de réservation
            // ("$interval->days"  accède au nombre total de jours entre les deux dates)
            if ($interval->days < 2) {
                throw new Exception("La réservation doit durer au moins 2 jours !");
            }
        }

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
    public function cancel()
    {
        // si le statut de la réservation est "CART" alors on peut passer le statut en "CANCELLED"
        if ($this->status === "CART") {
            $this->status = "CANCELLED";
            $this->cancelledAt = new DateTime();
        } else {
            throw new Exception("La réservation ne peut être annulée que si elle est en statut CART ou inexistante.");
        }
    }

    // création d'une méthode pour payer la réservation
    public function pay()
    {
        // si le statut de la réservation est "CART" alors on peut passer le statut en "PAID"
        if ($this->status === "CART") {
            $this->status = "PAID";
            $this->paidAt = new DateTime();
        } else {
            throw new Exception("La réservation ne peut pas être payée si elle n'est pas en statut CART ou inexistante.");
        }
    }

    // création d'une méthode pour laisser un commentaire
    public function leaveComment($comment)
    {

        // Vérifie si le commentaire est vide
        if (empty($comment) || is_null($comment)) {
            throw new Exception("Le commentaire ne peut pas être vide.");
        }

        // Vérifie la taille du commentaire
        if (strlen($comment < 10)) {
            throw new Exception("Votre commentaire est invalide, il doit faire plus de 10 caractères");
        }

        // si le statut de la réservation est "PAID" alors on peut passer le statut en "COMMENTED" en ajoutant un commentaire 
        // en paramètre
        if ($this->status === "PAID") {
            $this->status = "COMMENTED";
            $this->commentedAt = new DateTime();
            $this->comment = $comment;
        } else {
            throw new Exception("La réservation ne peut pas être commentée si elle n'est pas payée, inexistante ou déjà commentée.");
        }
    }
}
