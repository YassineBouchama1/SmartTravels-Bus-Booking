<?php
class Client {
    private $email;
    private $password;
    private $inactive;
    private $date_created;
    private $points;

    public function __construct($email, $password, $inactive, $date_created, $points) {
        $this->email = $email;
        $this->password = $password;
        $this->inactive = $inactive;
        $this->date_created = $date_created;
        $this->points = $points;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function isInactive() {
        return $this->inactive;
    }

    public function getDateCreated() {
        return $this->date_created;
    }

    public function getPoints() {
        return $this->points;
    }

    

}

?>