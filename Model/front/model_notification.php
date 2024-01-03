<?php


include_once "Model\admin_class\class_notification.php" ; 






class Adminreservation extends Database {


    public function getAllreservation(){

        $consulta = $this->getConnection()->prepare("SELECT * FROM  reservation" );
        $consulta->execute();
        $resultados = $consulta->fetchAll();

        $reservation = array(); 
        foreach ($resultados as $B) {
            $reservation[] = new admin_Reservation($B["id"],$B["email_client"],$B["ID_Horaire"], $B["number_seat"]);
        }
        return $reservation;
       
    }

    public function getCapacitereservation($id){

        $consulta = $this->getConnection()->prepare("SELECT b.Capacite FROM horaire h , bus b WHERE h.ID = '$id' AND h.ID_Bus = b.Numero_de_bus" );
        $consulta->execute();
        $resultados = $consulta->fetch();

     
        return $resultados;
       
    }

    
    public function getByIdreservation($id){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM reservation  WHERE id = :id");
        $consulta->execute(array(
            "id" => $id
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetch();

        $reservation = array(); 
     
            $reservation[] = new admin_Reservation($resultados["id"],$resultados["email_client"],$resultados["ID_Horaire"], $resultados["number_seat"]);
      
        return $reservation;
    }
    
    public function getByColumnreservation($column,$value){
        $consulta = $this->getConnection()->prepare("SELECT * 
                                                FROM reservation WHERE " . $column . " = :value");
        $consulta->execute(array(
            "value" => $value
        ));
        $resultados = $consulta->fetch();
       
        $reservation = array(); 

     
        $reservation[] = new admin_Reservation($resultados["id"],$resultados["email_client"],$resultados["ID_Horaire"], $resultados["number_seat"]);
  
    return $reservation;
    }
    
    public function deleteByIdreservation($id){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM reservation WHERE id = :id");
            $consulta->execute(array(
                "id" => $id
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteByColumnreservation($column,$value){
        try {
            $consulta = $this->getConnection()->prepare("DELETE FROM reservation WHERE :column = :value");
            $consulta->execute(array(
                "column" => $value,
                "value" => $value,
            ));
           
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }


    public function Insertreservation($email_client,$ID_Horaire,$number_seat){

        $consulta = $this->getConnection()->prepare("INSERT INTO reservation(email_client,ID_Horaire,number_seat)
                                        VALUES (:email_client,:ID_Horaire,:number_seat)");
        $result = $consulta->execute(array(
            "email_client" => $email_client,
            "ID_Horaire" => $ID_Horaire,
            "number_seat" => $number_seat
          
        ));

        return $result; 
    }

    public function Updatereservation($id, $email_client, $ID_Horaire, $number_seat) {
        try {
            $consulta = $this->getConnection()->prepare("
                UPDATE reservation 
                SET 
                    email_client = :email_client,  
                    ID_Horaire = :ID_Horaire,
                    number_seat = :number_seat
                WHERE id = :id 
            ");
    
            $resultado = $consulta->execute(array(
                "email_client" => $email_client,
                "ID_Horaire" => $ID_Horaire,
                "number_seat" => $number_seat,
                "id" => $id
            ));
    
            return $resultado;
        } catch (PDOException $e) {
            // Handle database errors
            // Log or return an error message
            return false;
        }
    }
    




 
}


