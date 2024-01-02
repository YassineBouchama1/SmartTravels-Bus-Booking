<?php 
class admin_route {

    
    private $ID;
    private $Ville_depart;
    private $Ville_destination;
    private $Distance;
    private $Duree;

    public function __construct($ID, $Ville_depart, $Ville_destination, $Distance, $Duree) {
        $this->ID = $ID;
        $this->Ville_depart = $Ville_depart;
        $this->Ville_destination = $Ville_destination;
        $this->Distance = $Distance;
        $this->Duree = $Duree;
    }

    // Getter methods
    public function getID() {
        return $this->ID;
    }

    public function getVille_depart() {
        return $this->Ville_depart;
    }

    public function getVille_destination() {
        return $this->Ville_destination;
    }

    public function getDistance() {
        return $this->Distance;
    }

    public function getDuree() {
        return $this->Duree;
    }
}



