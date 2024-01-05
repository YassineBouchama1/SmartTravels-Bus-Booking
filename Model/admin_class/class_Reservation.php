<?php 


class admin_Reservation {
    private $id;
    private $email_client;
    private $ID_Horaire;
    private $number_seat;

    public function __construct($id, $email_client, $ID_Horaire, $number_seat) {
        $this->id = $id;
        $this->email_client = $email_client;
        $this->ID_Horaire = $ID_Horaire;
        $this->number_seat = $number_seat;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getEmailClient() {
        return $this->email_client;
    }

    public function getIDHoraire() {
        return $this->ID_Horaire;
    }

    public function getNumberSeat() {
        return $this->number_seat;
    }
}
