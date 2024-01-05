<?php

include_once("Model\admin_class\class_Reservation.php");
// include_once "Model\Client_Class\Clientclass.php" ; 

class Databas
{
    private $host = "localhost";
    private $db_name = "smarttravelgroup";
    private $username = "root";
    private $password = "1234";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

class Reservation extends Databas
{


    public function getReservationsByOperator($operatorEmail)
    {
        $company_id = $this->getCompanyIdByOperatorEmail($operatorEmail);

        $statement = $this->getConnection()->prepare("SELECT r.*,  b.Numero_de_bus, h.Date AS date, h.Heure_depart AS departure_time
        FROM reservation r
        INNER JOIN horaire h ON r.ID_Horaire = h.ID
        INNER JOIN bus b ON h.ID_Bus = b.Numero_de_bus
        WHERE b.Company_id = :company_id");

        $statement->execute(array("company_id" => $company_id));
        $results = $statement->fetchAll();




        return $results;
    }


    //to get company_id by operator email
    private function getCompanyIdByOperatorEmail($operatorEmail)
    {
        $statement = $this->getConnection()->prepare("SELECT company_id FROM operator WHERE email = :email");
        $statement->execute(array("email" => $operatorEmail));
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result["company_id"];
        } else {

            return null;
        }
    }
}
