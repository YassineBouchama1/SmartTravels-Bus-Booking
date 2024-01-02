<?php 

class admin_bus {

    private $Numero_de_bus;
    private $busNumber;
    private $Plaque_immatriculation;
    private $Capacite;
    private $Company_id;

    public function __construct($Numero_de_bus, $busNumber, $Plaque_immatriculation, $Capacite, $Company_id) {
        $this->Numero_de_bus = $Numero_de_bus;
        $this->busNumber = $busNumber;
        $this->Plaque_immatriculation = $Plaque_immatriculation;
        $this->Capacite = $Capacite;
        $this->Company_id = $Company_id;
    }

    // Getter methods
    public function getNumero_de_bus() {
        return $this->Numero_de_bus;
    }

    public function getBusNumber() {
        return $this->busNumber;
    }

    public function getPlaque_immatriculation() {
        return $this->Plaque_immatriculation;
    }

    public function getCapacite() {
        return $this->Capacite;
    }

    public function getCompany_id() {
        return $this->Company_id;
    }
}

