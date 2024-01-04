<?php 


class Notification_class {

    private $id;
    private $content;
    private $ID_Horaire; 
    private $number_seat; 
    private $time_created;
    
    public function __construct($id, $content, $ID_Horaire, $number_seat) {
        $this->id = $id;
        $this->content = $content;
        $this->ID_Horaire = $ID_Horaire;
        $this->number_seat = $number_seat;
    }

    // Getter methods
    public function getId() {
        return $this->id;
    }

    public function getContent() { 
        return $this->content;
    }

    public function getIDHoraire() {
        return $this->ID_Horaire;
    }

    public function getNumberSeat() {
        return $this->number_seat;
    }
}

