<?php




class Client {
    private $email;
    private $password;
    private $inactive;
    private $date_created;
    private $points;
    private $is_client;

  
    public function __construct($email, $password, $inactive, $points , $is_client ) {
        $this->email = $email;
        $this->password = $password;
        $this->inactive = $inactive;
   
        $this->points = $points;
        $this->is_client = $is_client;
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

    
    public function getIs_client()
    {
        return $this->is_client;
    }
}

?>