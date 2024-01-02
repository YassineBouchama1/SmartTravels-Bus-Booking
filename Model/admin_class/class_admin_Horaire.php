<?php 

class admin_Horaire {

    private $ID;
    private $Date;
    private $Heure_depart;
    private $Heure_arrivee;
    private $Sieges_disponibles;
    private $ID_Bus;
    private $ID_Route;
    private $price;

    public function __construct($ID, $Date, $Heure_depart, $Heure_arrivee, $Sieges_disponibles, $ID_Bus, $ID_Route, $price) {
        $this->ID = $ID;
        $this->Date = $Date;
        $this->Heure_depart = $Heure_depart;
        $this->Heure_arrivee = $Heure_arrivee;
        $this->Sieges_disponibles = $Sieges_disponibles;
        $this->ID_Bus = $ID_Bus;
        $this->ID_Route = $ID_Route;
        $this->price = $price;
    }

    // Getter methods
    public function getID() {
        return $this->ID;
    }

    public function getDate() {
        return $this->Date;
    }

    public function getHeure_depart() {
        return $this->Heure_depart;
    }

    public function getHeure_arrivee() {
        return $this->Heure_arrivee;
    }

    public function getSieges_disponibles() {
        return $this->Sieges_disponibles;
    }

    public function getID_Bus() {
        return $this->ID_Bus;
    }

    public function getID_Route() {
        return $this->ID_Route;
    }

    public function getPrice() {
        return $this->price;
    }
}


